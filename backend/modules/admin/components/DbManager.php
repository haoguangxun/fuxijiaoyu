<?php
namespace backend\modules\admin\components;

use backend\modules\admin\models\AdminRolePerm;
use yii\helpers\ArrayHelper;
use backend\modules\admin\models\AdminRole;
use backend\modules\admin\models\AdminRoute;
use backend\modules\admin\models\AdminPermission;
use yii\caching\TagDependency;

class DbManager
{
    /**
     * 默认角色
     * @var Array
     */
    public $defaultRoles = [];
    
    /**
     * root 独有
     * @var Array
     */
    public static $onlyRootPerms = ['/admin/route/*','/admin/permission/*','/admin/menu/*','/admin/assignment/*'];
    
    /**
     * root 独有
     * @var Array
     */
    public static $onlyRootRoles = ['root'];
    
    
    
    /**
     * @inheritdoc
     * 检查权限
     */
    public function checkAccess($userId, $permissionName, $params = [])
    {
        if(empty($userId)) return false;
        
        //缓存
        $cache = Configs::cache();
        if (!$cache || ($permissions = $cache->get([__METHOD__, $userId])) == false) {
            $permissions = $this->getPermissionsByUser($userId);
            
            if ($cache) {
                $cache->set([__METHOD__, $userId], $permissions, Configs::cacheDuration(), new TagDependency([
                    'tags' => Configs::CACHE_TAG
                ]));
            }
        }
       
        
        if(!empty($permissions)) {
            $routes = [];
            foreach ($permissions as $k => $permission) {
                $routes[$permission['route']] = ['id'=>$permission['id'],'data'=>$permission['data']];
            }
            
            //默认路由权限
            $manager = \Yii::$app->getAuthManager();
            $defaultRoles = $manager->defaultRoles;
            
            if(!empty($defaultRoles)) foreach ($defaultRoles as $role=>$defaultRoutes) {
                
                if(in_array($permissionName, $defaultRoutes)) {
                    
                    return true;
                }
            }
            
            //$permissionName = '/admin/menu/*'; //debug
            if(isset($routes[$permissionName])) {
                
                //$params = ['a'=>13,'f'=>3]; //debug
                if(!empty($params) && is_array($params) && !empty($routes[$permissionName]['data'])) {
                    if(isset($params['r'])) unset($params['r']);
                    ksort($params); //a-z排序
                    $params = http_build_query($params);
                    
                    if($params == $routes[$permissionName]['data']) {
                        return true;
                    } else {
                        
                        return false;
                    }
                }
                
                return true;
                
            }
            
            
            return false;
            
        }
        
        return false;
        
    }
    
    /**
     * @inheritdoc
     * 通过userid获得权限(获得登录者的权限)
     */
    public function getPermissionsByUser($userId = 0)
    {
        if (empty($userId)) {
            return [];
        }
        
        $roleId = \Yii::$app->user->identity->roleid;
        $permission = $this->getPermissionsByRole($roleId);
        
        return $permission;
        
    }
    
    /**
     * @inheritdoc
     * 获得权限根据 角色id
     */
    public function getPermissionsByRole($roleId = 0)
    {
        if (empty($roleId)) {
            return [];
        }
    
    
        $rolePerms = AdminRolePerm::find()->where(['roleid'=>$roleId])->asArray()->all();
        $permids = ArrayHelper::getColumn($rolePerms, 'permid');
        $permissions = AdminPermission::find()->where(['in', 'id', $permids])->asArray()->all();
        //print_r($permissions);
        //exit;
    
        return $permissions;
    
    }
    
    
  
    
    /**
     * @inheritdoc
     * 获得角色根据角色ID
     */
    public function getRolesById($roleId = 0)
    {
        if (empty($roleId)) {
            return [];
        }
    
        $role = AdminRole::find()->where(['id'=>$roleId])->asArray()->one();
        
        return $role;
    }
    
    
    /**
     * @inheritdoc
     * 获得已注册的所有路由
     */
    public function getRoutes()
    {
        $routes = AdminRoute::find()->asArray()->all();
    
        return $routes;
    }
    
    /**
     * @inheritdoc
     * 获得所有权限路由
     */
    public function getPermissions()
    {
        $permissions = AdminPermission::find()->asArray()->all();
        
        return $permissions;
    }
    
    
    /**
     * @inheritdoc
     * 获得所有权限路由（限制普通管理员）
     */
    public function getPermissionNoRoot()
    {
        $where = ['not in','route',self::$onlyRootPerms];
        
        $permissions = AdminPermission::find()->where($where)->asArray()->all();
    
        return $permissions;
    }
    
    
    /**
     * @inheritdoc
     * 获得所有角色
     */
    public function getRoles()
    {
        $roles = AdminRole::find()->asArray()->all();
    
        return $roles;
    }
    
    /**
     * @inheritdoc
     * 获得所有角色（限制普通管理员）
     */
    public function getRolesNoRoot()
    {
        $where = ['not in','name',self::$onlyRootRoles];
    
        $roles = AdminRole::find()->where($where)->asArray()->all();
    
        return $roles;
    }
    
}
