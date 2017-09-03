<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%admin_permission}}".
 *
 * @property string $id
 * @property string $name
 * @property string $route
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class AdminPermission extends \yii\db\ActiveRecord
{
    private static $_routes;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_permission}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name','data'], 'string', 'max' => 128],
            [['route'], 'in',
            'range' => static::getSavedRoutes(),
            'message' => 'Route "{value}" not found.'],
            [['created_at','updated_at'],'default', 'value' => function ($model, $attribute) {
                return time();
            }],
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
            'route' => Yii::t('rbac-admin', 'Route'),
            'data' => '参数数据',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
    
    
    /**
     * Get saved routes.
     * @return array
     */
    public static function getSavedRoutes()
    {
        if (self::$_routes === null) {
            self::$_routes = [];
            foreach (Yii::$app->getAuthManager()->getRoutes() as $value) {
                $name = $value['route'];
                if ($name[0] === '/') {
                    self::$_routes[] = $name;
                }
            }
        }
        return self::$_routes;
    }
    


  
}
