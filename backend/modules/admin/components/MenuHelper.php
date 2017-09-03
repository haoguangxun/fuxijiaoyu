<?php
namespace backend\modules\admin\components;

use Yii;
use yii\caching\TagDependency;
use backend\modules\admin\models\AdminMenu;

/**
 * MenuHelper used to generate menu depend of user role.
 * Usage
 * 
 * ```
 * use backend\modules\admin\components\MenuHelper;
 * use yii\bootstrap\Nav;
 *
 * echo Nav::widget([
 *    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
 * ]);
 * ```
 * 
 * To reformat returned, provide callback to method.
 * 
 * ```
 * $callback = function ($menu) {
 *    $data = eval($menu['data']);
 *    return [
 *        'label' => $menu['name'],
 *        'url' => [$menu['route']],
 *        'options' => $data,
 *        'items' => $menu['children']
 *        ]
 *    ]
 * }
 *
 * $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, 0, $callback);
 * ```
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class MenuHelper
{
    /**
     * Use to get assigned menu of user.
     * 用户获得授权的菜单
     * @param mixed $roleId
     * @param integer $root
     * @param \Closure $callback use to reformat output.
     * callback should have format like
     * 
     * ```
     * function ($menu) {
     *    return [
     *        'label' => $menu['name'],
     *        'url' => [$menu['route']],
     *        'options' => $data,
     *        'items' => $menu['children']
     *        ]
     *    ]
     * }
     * ```
     * @param boolean  $refresh
     * @return array
     */
    public static function getAssignedMenu($roleId, $root = 0, $callback = null, $refresh = false)
    {
        $config = Configs::instance();

        /* @var $manager backend\modules\admin\components\DbManager */
        $manager = Yii::$app->getAuthManager();
        $menus = AdminMenu::find()->asArray()->indexBy('id')->all();
        
        $key = [__METHOD__, $roleId, $manager->defaultRoles];
        $cache = $config->cache;
        
        //$refresh = true; //debug
        
        if ($refresh || $cache === null || ($assigned = $cache->get($key)) === false) {
            $routes = $filter1 = $filter2 = [];
            if ($roleId !== null) {
                foreach ($manager->getPermissionsByRole($roleId) as $value) {
                    $name = $value['route'];
                    if ($name[0] === '/') {
                        if (substr($name, -2) === '/*') {
                            $name = substr($name, 0, -1);
                        }
                        $routes[] = $name;
                    }
                }
            }
            
            
            foreach ($manager->defaultRoles as $roles) {
                foreach ($roles as $name) {
                    if ($name[0] === '/') {
                        if (substr($name, -2) === '/*') {
                            $name = substr($name, 0, -1); //去掉*
                        }
                        $routes[] = $name;
                    }
                }
            }
            
            $routes = array_unique($routes);
            sort($routes);
            
            $prefix = '\\';
            foreach ($routes as $route) {  
                //没有找到\
                if (strpos($route, $prefix) !== 0) { 
                    if (substr($route, -1) === '/') { // 以/开头
                        $prefix = $route;
                        $filter1[] = $route . '%'; //搜索/开头的
                    } else {
                        $filter2[] = $route;
                    }
                }
            }
            
            $assigned = [];
            
            $query = AdminMenu::find()->select(['id'])->asArray();
            
            if (count($filter2)) {
                $assigned = $query->where(['route' => $filter2])->column();
            }
            
            
            if (count($filter1)) {
                $query->where('route like :filter');
                foreach ($filter1 as $filter) {
                    $assigned = array_merge($assigned, $query->params([':filter' => $filter])->column());
                }
            }
            //确保所有的父菜单项已经添加
            $assigned = static::requiredParent($assigned, $menus);
            
            if ($cache !== null) {
                $cache->set($key, $assigned, $config->cacheDuration, new TagDependency([
                    'tags' => Configs::CACHE_TAG
                ]));
            }
        }

        $key = [__METHOD__, $assigned, $root];
        if ($refresh || $callback !== null || $cache === null || (($result = $cache->get($key)) === false)) {
            $result = static::normalizeMenu($assigned, $menus, $callback, $root);
            if ($cache !== null && $callback === null) {
                $cache->set($key, $result, $config->cacheDuration, new TagDependency([
                    'tags' => Configs::CACHE_TAG
                ]));
            }
        }

        return $result;
    }

    /**
     * Ensure all item menu has parent.
     * 确保所有的父菜单项已经添加
     * @param array $assigned
     * @param array $menus
     * @return array
     */
    private static function requiredParent($assigned, &$menus)
    {
        $l = count($assigned);
        for ($i = 0; $i < $l; $i++) {
            $id = $assigned[$i];
            if(empty($menus[$id])) continue;
            $parent_id = intval($menus[$id]['parentid']);
            if ($parent_id !== 0 && !in_array($parent_id, $assigned)) {
                $assigned[$l++] = $parent_id;
            }
        }

        return $assigned;
    }

    /**
     * Parse route
     * 分析路由
     * @param  string $route
     * @return mixed
     */
    public static function parseRoute($route)
    {
        if (!empty($route)) {
            $url = [];
            $r = explode('&', $route);
            $url[0] = $r[0];
            unset($r[0]);
            foreach ($r as $part) {
                $part = explode('=', $part);
                $url[$part[0]] = isset($part[1]) ? $part[1] : '';
            }

            return $url;
        }

        return '#';
    }

    /**
     * Normalize menu
     * 标准化菜单
     * @param  array $assigned
     * @param  array $menus
     * @param  Closure $callback
     * @param  integer $parentId
     * @return array
     */
    private static function normalizeMenu(&$assigned, &$menus, $callback, $parentId = 0)
    {
        $result = [];
        $order = [];
        
        foreach ($assigned as $id) {
            if(empty($menus[$id])) continue;
            $menu = $menus[$id];
            if ($menu['parentid'] == $parentId) {
                $menu['children'] = static::normalizeMenu($assigned, $menus, $callback, $id);
                if ($callback !== null) {
                    $item = call_user_func($callback, $menu);
                } else {
                    $item = [
                        'label' => $menu['name'],
                        'url' => static::parseRoute($menu['route']),
                    ];
                    if ($menu['children'] != []) {
                        $item['items'] = $menu['children'];
                    }
                }
                $result[] = $item;
                $order[] = $menu['order'];
            }
        }
        if ($result != []) {
            array_multisort($order, $result);
        }

        return $result;
    }
}
