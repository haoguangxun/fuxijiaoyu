<?php
namespace backend\modules\admin\components;

use Yii;
use yii\web\User;
use yii\helpers\ArrayHelper;
use yii\caching\TagDependency;

/**
 * Description of Helper
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 2.3
 */
class Helper
{
    /**
     * 所有用户路由
     * @var array
     */
    private static $_userRoutes = [];
    /**
     * 默认路由
     * @var array
     */
    private static $_defaultRoutes;
    /**
     * 已经注册的路由权限
     * @var array
     */
    private static $_routes;

    /**
     * 获得已注册的路由权限
     */
    public static function getRegisteredRoutes()
    {
        if (self::$_routes === null) {
            self::$_routes = [];
            $manager = Yii::$app->getAuthManager();
            
            foreach ($manager->getPermissions() as $permission) {
                if ($permission['route'][0] === '/') {
                    self::$_routes[$permission['route']] = $permission['route'];
                }
            }
        }
        return self::$_routes;
    }

    /**
     * Get assigned routes by default roles
     * 获得已分配的默认路由权限
     * @return array
     */
    protected static function getDefaultRoutes()
    {
        if (self::$_defaultRoutes === null) {
            $manager = Yii::$app->getAuthManager();
            //默认角色
            $roles = $manager->defaultRoles;
            //缓存
            $cache = Configs::cache();
            
            if ($cache && ($routes = $cache->get($roles)) !== false) {
                self::$_defaultRoutes = $routes;
            } else {
                $permissions = self::$_defaultRoutes = [];
                
                foreach ($roles as $role=>$_permissions) {
                    //合并默认权限
                    $permissions = array_merge($permissions, $_permissions);
                }
                
                if(!empty($permissions)) foreach ($permissions as $permission) {
                    if ($permission[0] === '/') {
                        //如果是路由，存入默认路由
                        self::$_defaultRoutes[$permission] = true;
                    }
                }
                //写入缓存
                if ($cache) { 
                    //以$roles数组的has值（32）为key存入缓存
                    $cache->set($roles, self::$_defaultRoutes, Configs::cacheDuration(), new TagDependency([
                        'tags' => Configs::CACHE_TAG
                    ]));
                }
            }
        }
        return self::$_defaultRoutes;
    }

    /**
     * Get assigned routes of user.
     * 通过用户获取分配的路由
     * @param integer $userId
     * @return array
     */
    public static function getRoutesByUser($userId)
    {
        if (!isset(self::$_userRoutes[$userId])) {
            //缓存
            $cache = Configs::cache();
            
            //$cache = null; //debug
            
            if ($cache && ($routes = $cache->get([__METHOD__, $userId])) !== false) {
                self::$_userRoutes[$userId] = $routes;
            } else {
                //获得默认路由权限
                $routes = static::getDefaultRoutes();
                $manager = Yii::$app->getAuthManager();
               
                //获得用户自身路由权限
                foreach ($manager->getPermissionsByUser($userId) as $permission) {
                    if ($permission['route'][0] === '/') {
                        $routes[$permission['route']] = true;
                    }
                }
               
                self::$_userRoutes[$userId] = $routes;
                
                if ($cache) {
                    //本方法+Uid 为key存入缓存
                    $cache->set([__METHOD__, $userId], $routes, Configs::cacheDuration(), new TagDependency([
                        'tags' => Configs::CACHE_TAG
                    ]));
                }
            }
        }
        return self::$_userRoutes[$userId];
    }

    /**
     * Check access route for user.
     * 检查用户是否有通过路由的权限
     * @param string|array $route
     * @param integer|User $user
     * @return boolean
     */
    public static function checkRoute($route, $params = [], $user = null)
    {
        $config = Configs::instance();
        $r = static::normalizeRoute($route);
        
        //$config->onlyRegisteredRoute = true; //debug
        
        if ($config->onlyRegisteredRoute && !isset(static::getRegisteredRoutes()[$r])) {
            return true;
        }

        if ($user === null) {
            $user = Yii::$app->getUser();
        }
        
        $userId = $user instanceof User ? $user->getId() : $user;

        //$config->strict = false; //debug
        if ($config->strict) {
            
            //检测带参数数据的，会调用DbManager::checkAccess()
            //直接检测
            if ($user->can($r, $params)) {
                return true;
            }
            
            //检测根所有权 (逐层)
            while (($pos = strrpos($r, '/')) > 0) {  
                $r = substr($r, 0, $pos);
                if ($user->can($r . '/*', $params)) {
                    return true;
                }
            }
            
            //检测全部权限
            return $user->can('/*', $params);
        } else {
            //获得该用户的路由权限(含默认权限)
            $routes = static::getRoutesByUser($userId);
            
            //直接检测
            if (isset($routes[$r])) {
                return true;
            }
            //检测根所有权
            while (($pos = strrpos($r, '/')) > 0) {
                $r = substr($r, 0, $pos);
                if (isset($routes[$r . '/*'])) {
                    return true;
                }
            }
            //检测全部权限
            return isset($routes['/*']);
        }
    }

    /**
     * 标准化路由
     * @param string $route
     */
    protected static function normalizeRoute($route)
    {
        if ($route === '') {
            return '/' . Yii::$app->controller->getRoute();
        } elseif (strncmp($route, '/', 1) === 0) {
            return $route;
        } elseif (strpos($route, '/') === false) {
            return '/' . Yii::$app->controller->getUniqueId() . '/' . $route;
        } elseif (($mid = Yii::$app->controller->module->getUniqueId()) !== '') {
            return '/' . $mid . '/' . $route;
        }
        return '/' . $route;
    }

    /**
     * Filter menu items
     * 过滤菜单
     * @param array $items
     * @param integer|User $user
     */
    public static function filter($items, $user = null)
    {
        if ($user === null) {
            $user = Yii::$app->getUser();
        }
        return static::filterRecursive($items, $user);
    }

    /**
     * Filter menu recursive
     * 递归过滤菜单
     * @param array $items
     * @param integer|User $user
     * @return array
     */
    protected static function filterRecursive($items, $user)
    {
        $result = [];
        foreach ($items as $i => $item) {
            $url = ArrayHelper::getValue($item, 'url', '#');
            $allow = is_array($url) ? static::checkRoute($url[0], array_slice($url, 1), $user) : true;

            if (isset($item['items']) && is_array($item['items'])) {
                $subItems = self::filterRecursive($item['items'], $user);
                if (count($subItems)) {
                    $allow = true;
                }
                $item['items'] = $subItems;
            }
            if ($allow) {
                $result[$i] = $item;
            }
        }
        return $result;
    }

    /**
     * Filter action column button. Use with [[yii\grid\GridView]]
     * 过滤GridView 按钮
     * ```php
     * 'columns' => [
     *     ...
     *     [
     *         'class' => 'yii\grid\ActionColumn',
     *         'template' => Helper::filterActionColumn(['view','update','activate'])
     *     ]
     * ],
     * ```
     * @param array|string $buttons
     * @param integer|User $user
     * @return string
     */
    public static function filterActionColumn($buttons = [], $user = null)
    {
        if (is_array($buttons)) {
            $result = [];
            foreach ($buttons as $button) {
                if (static::checkRoute($button, [], $user)) {
                    $result[] = "{{$button}}";
                }
            }
            return implode(' ', $result);
        }
        return preg_replace_callback('/\\{([\w\-\/]+)\\}/', function ($matches) use ($user) {
            return static::checkRoute($matches[1], [], $user) ? "{{$matches[1]}}" : '';
        }, $buttons);
    }

    /**
     * Use to invalidate cache.
     * 使缓存失效
     */
    public static function invalidate()
    {
        if (Configs::cache() !== null) {
            TagDependency::invalidate(Configs::cache(), Configs::CACHE_TAG);
        }
    }
}
