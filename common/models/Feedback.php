<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property string $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $content
 * @property string $addtime
 * @property string $note
 * @property string $admin_id
 * @property integer $status
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%feedback}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'addtime', 'admin_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['content'], 'string', 'max' => 200],
            [['email'], 'string', 'max' => 30],
            [['note'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'phone' => '手机',
            'email' => '邮箱',
            'content' => '内容',
            'addtime' => '时间',
            'note' => '备注',
            'admin_id' => '操作人ID',
            'status' => '状态：0.未处理，1.已处理',
        ];
    }
}
