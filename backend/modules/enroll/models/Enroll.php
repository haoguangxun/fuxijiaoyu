<?php

namespace backend\modules\enroll\models;

use Yii;

class Enroll extends \common\models\Enroll
{

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
