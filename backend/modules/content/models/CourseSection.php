<?php

namespace backend\modules\content\models;

use Yii;

/**
 * This is the model class for table "{{%course_section}}".
 *
 * @property string $id
 * @property string $name
 * @property string $subtitle
 * @property string $video
 * @property string $url
 * @property string $template
 * @property integer $audition
 */
class CourseSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course_section}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'courseid', 'audition'], 'integer'],
            [['name'], 'required'],
            [['name', 'subtitle'], 'string', 'max' => 80],
            [['video', 'url'], 'string', 'max' => 100],
            [['template'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'courseid' => '课程ID',
            'name' => '小节名称',
            'subtitle' => '副标题',
            'video' => '视频地址',
            'url' => '链接地址',
            'template' => '模板',
            'audition' => '是否可试听',
        ];
    }
}
