<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%admin_role_perm}}".
 *
 * @property integer $id
 * @property integer $roleid
 * @property string $permid
 */
class AdminRolePerm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_role_perm}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'roleid', 'permid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'roleid' => 'Roleid',
            'permid' => 'Permid',
        ];
    }
    
    
    
   
    
    
    
   
}
