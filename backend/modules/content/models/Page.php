<?php

namespace backend\modules\content\models;

use Yii;

/**
 * This is the model class for table "{{%page}}".
 *
 * @property integer $catid
 * @property string $title
 * @property string $subtitle
 * @property string $thumb
 * @property string $video
 * @property string $keywords
 * @property string $description
 * @property string $content
 * @property string $template
 * @property string $updatetime
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catid', 'updatetime'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string'],
            [['title', 'subtitle'], 'string', 'max' => 80],
            [['thumb', 'video'], 'string', 'max' => 100],
            [['keywords'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200],
            [['template'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'catid' => 'Catid',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'thumb' => 'Thumb',
            'video' => 'Video',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'content' => 'Content',
            'template' => 'Template',
            'updatetime' => 'Updatetime',
        ];
    }
}
