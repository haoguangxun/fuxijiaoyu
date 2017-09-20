<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%member_teacher}}".
 *
 * @property string $userid
 * @property string $realname
 * @property integer $sex
 * @property string $hobby
 */
class MemberTeacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_teacher}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex'], 'integer'],
            [['realname'], 'string', 'max' => 20],
            [['hobby'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => '用户ID',
            'realname' => '真实姓名',
            'sex' => '性别：1男，2女',
            'hobby' => '个人爱好',
        ];
    }
}
