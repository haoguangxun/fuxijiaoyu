<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%enroll}}".
 *
 * @property string $id
 * @property string $name
 * @property string $contact
 * @property integer $learn
 * @property integer $learning_level
 * @property string $expect_teacher
 * @property string $addtime
 * @property string $admin_id
 * @property string $note
 * @property integer $status
 */
class Enroll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%enroll}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['learn', 'learning_level', 'addtime', 'admin_id', 'status'], 'integer'],
            [['name', 'contact'], 'string', 'max' => 20],
            [['expect_teacher'], 'string', 'max' => 30],
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
            'contact' => '联系方式',
            'learn' => '是否学过琴',
            'learning_level' => '学习程度',
            'expect_teacher' => '期望老师',
            'addtime' => '报名时间',
            'admin_id' => '操作人ID',
            'note' => '备注',
            'status' => '状态',
        ];
    }
}
