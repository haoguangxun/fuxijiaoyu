<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%course_collection}}".
 *
 * @property string $id
 * @property string $userid
 * @property string $courseid
 */
class CourseCollection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course_collection}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'courseid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => '会员ID',
            'courseid' => '课程ID',
        ];
    }
}
