<?php
namespace backend\modules\admin\models;

use Yii;
use backend\modules\admin\components\Helper;

/**
 * This is the model class for table "{{%admin_role}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $order
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class AdminRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description','name'], 'required'],
            [['description'], 'string'],
            [['order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['created_at','updated_at'],'default', 'value' => function ($model, $attribute) {
                return time();
            }],
            [['order','status'],'default', 'value' => '0'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('rbac-admin', 'Name'),
            'description' => Yii::t('rbac-admin', 'Description'),
            'order' => Yii::t('rbac-admin', 'Order'),
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
    
    
    /**
     * Get RolePerm
     */
    public function getRolePerm()
    {
        return $this->hasMany(AdminRolePerm::className(), ['roleid'=>'id'])->asArray();
    
    }
    
    /**
     * Get Permission
     */
    public function getPermission()
    {
        return $this->hasMany(AdminPermission::className(), ['id'=>'permid'])->via('rolePerm')->asArray();
        
    }
    
    /**
     * Get items
     * 获得角色下的权限
     * @return array
     */
    public function getItems()
    {
        $manager = Yii::$app->getAuthManager();
        //拥有角色和 用户 为1 才可以显示分配更多的项
        if(Yii::$app->user->id ==1 || Yii::$app->user->identity->roleid ==1) {
            $permissions = $manager->getPermissions();
        } else {
            $permissions = $manager->getPermissionNoRoot();
        }
        
        
        $_permissions = $_permission = [];
        if(!empty($permissions)) {
            foreach ($permissions as $k => $v) {
                $_permissions[$v['route']] = ['id'=>$v['id'],'name'=>$v['name']];
            }
            unset($permissions);
        }
        if(!empty($this->permission)) {
            foreach ($this->permission as $k => $v) {
                $_permission[$v['route']] = ['id'=>$v['id'],'name'=>$v['name']];
            }
            //unset($this->permission);
        }
        
        $exists = [];
        if (!empty($_permission)) {
            foreach ($_permission as $route => $idName) {
                if ($route[0] !== '/') {
                    continue;
                }
                $exists[$route] = $idName;
                unset($_permissions[$route]);
            }
            unset($_permission);
        }
        
        unset($_permission);
        
        
        ksort($_permissions);
        ksort($exists);
        
        
        return[
            'avaliable' => $_permissions,
            'assigned' => $exists,
            
        ];
    }
    
    /**
     * Add Permission
     * 添加权限
     * @return array
     */
    public function addItems($items = [])
    {
        if(empty($items) || !is_array($items)) return 0;
        
        $success = 0;
     
        foreach ($items as $k => $item) {
            $data[$k]['roleid'] = $this->id;
            $data[$k]['permid'] = $item;
        }
        
       /*  print_r($data);
        exit; */
        $success = Yii::$app->db->createCommand()
        ->batchInsert(AdminRolePerm::tableName(),['roleid','permid'],
            $data)
            ->execute();
        
        
        if ($success > 0) {
            Helper::invalidate();//删除缓存
        }
        return $success;
        
    }
    
    
    /**
     * Remove an item as a child of another item.
     * 删除权限
     * @param array $items
     * @return int
     */
    public function removeItems($items = [])
    {
        if(empty($items) || !is_array($items)) return 0;
        
        $success = 0;
        
        $success = Yii::$app->getDb()->createCommand()
        ->delete(AdminRolePerm::tableName(), ['roleid'=>$this->id,'permid'=>$items])->execute();
        
        if ($success > 0) {
            Helper::invalidate();//删除缓存
        }
        return $success;
    }
    
    
    
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id'])->asArray();
    }
}
