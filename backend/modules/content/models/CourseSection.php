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
            [['id', 'audition'], 'integer'],
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
            'name' => 'Name',
            'subtitle' => 'Subtitle',
            'video' => 'Video',
            'url' => 'Url',
            'template' => 'Template',
            'audition' => 'Audition',
        ];
    }
}
