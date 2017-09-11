<?php

namespace backend\modules\content\models;

use Yii;

/**
 * This is the model class for table "{{%teacher_data}}".
 *
 * @property string $id
 * @property string $content
 * @property string $template
 */
class TeacherData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%teacher_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string'],
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
            'template' => 'Template',
        ];
    }
}
