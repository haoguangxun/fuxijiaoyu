<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%member_data}}".
 *
 * @property string $userid
 * @property string $realname
 * @property integer $sex
 * @property string $hobby
 * @property string $title
 * @property string $vitae
 */
class MemberData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hobby'], 'string', 'max' => 200],
            [['title'], 'string', 'max' => 100],
            [['vitae'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => '用户ID',
            'hobby' => '个人爱好',
            'title' => '头衔',
            'vitae' => '简历',
        ];
    }
}
