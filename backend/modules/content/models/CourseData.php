<?php

namespace backend\modules\content\models;

use Yii;

/**
 * This is the model class for table "{{%course_data}}".
 *
 * @property string $id
 * @property string $content
 * @property string $syllabus
 * @property string $data
 * @property string $material
 * @property string $template
 * @property string $click
 */
class CourseData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'click'], 'integer'],
            [['content', 'syllabus'], 'required'],
            [['content', 'syllabus'], 'string'],
            [['data', 'material'], 'string', 'max' => 100],
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
            'content' => 'Content',
            'syllabus' => 'Syllabus',
            'data' => 'Data',
            'material' => 'Material',
            'template' => 'Template',
            'click' => 'Click',
        ];
    }
}