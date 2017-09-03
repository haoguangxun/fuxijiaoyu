<?php

namespace backend\modules\admin\models;

use Yii;
use backend\modules\admin\components\Configs;
use yii\db\Query;

/**
 * This is the model class for table "{{%admin_menu}}".
 *
 * @property string $id AdminMenu id(autoincrement)
 * @property string $name
 * @property string $parentid
 * @property string $route
 * @property resource $data
 * @property integer $order
 * @property integer $status
 */
class AdminMenu extends \yii\db\ActiveRecord
{
    
    public $parent_name;
    private static $_routes;
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Configs::instance()->menuTable;
        //return '{{%admin_menu}}';
    }
    
    /**
     * @inheritdoc
     */
    public static function getDb()
    {
        if (Configs::instance()->db !== null) {
            return Configs::instance()->db;
        } else {
            return parent::getDb();
        }
    }
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_name'], 'in',
                'range' => static::find()->select(['name'])->column(),
                'message' => 'Menu "{value}" not found.'],
            [['parentid', 'route', 'data', 'order'], 'default', 'value' => function ($model, $attribute) {
                $intParams = ['order','parentid'];
                return ($model->$attribute) ? $model->$attribute : (in_array($attribute,$intParams)) ? 0 : '';
            }],
            [['parentid'], 'filterParent', 'when' => function() {
                return !$this->isNewRecord;
            }],
            [['order','status'], 'integer'],
            [['route'], 'in',
                'range' => static::getSavedRoutes(),
                'message' => 'Route "{value}" not found.'],
        ];
    }
    
    
    /**
     * Use to loop detected.
     */
    public function filterParent()
    {
        $parentid = $this->parentid;
        $db = static::getDb();
        $query = (new Query)->select(['parentid'])
        ->from(static::tableName())
        ->where('[[id]]=:id');
        while ($parentid) {
            if ($this->id == $parentid) {
                $this->addError('parent_name', 'Loop detected.');
                return;
            }
            $parentid = $query->params([':id' => $parentid])->scalar($db);
        }
    }
    
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('rbac-admin', 'ID'),
            'name' => Yii::t('rbac-admin', 'Name'),
            'parentid' => Yii::t('rbac-admin', 'Parent'),
            'parent_name' => Yii::t('rbac-admin', 'Parent Name'),
            'route' => Yii::t('rbac-admin', 'Route'),
            'order' => Yii::t('rbac-admin', 'Order'),
            'data' => Yii::t('rbac-admin', 'Data'),
            'status' => 'Status',
        ];
    }
   
    
    /**
     * Get menu parentid
     * @return \yii\db\ActiveQuery
     */
    public function getMenuParent()
    {
        return $this->hasOne(AdminMenu::className(), ['id' => 'parentid']);
    }
    
    
    /**
     * Get menu children
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(AdminMenu::className(), ['parentid' => 'id']);
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
                if ($name[0] === '/' && substr($name, -1) != '*') {
                    self::$_routes[] = $name;
                }
            }
        }
        return self::$_routes;
    }
    
    
    public static function getMenuSource()
    {
        $tableName = static::tableName();
        return (new \yii\db\Query())
        ->select(['m.id', 'm.name', 'm.route', 'parent_name' => 'p.name'])
        ->from(['m' => $tableName])
        ->leftJoin(['p' => $tableName], '[[m.parentid]]=[[p.id]]')
        ->all(static::getDb());
    }
    
}
