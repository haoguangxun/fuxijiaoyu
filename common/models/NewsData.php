<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%news_data}}".
 *
 * @property string $id
 * @property string $content
 * @property string $template
 * @property string $copyfrom
 * @property string $click
 */
class NewsData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'click'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string'],
            [['template'], 'string', 'max' => 30],
            [['copyfrom'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '文章ID',
            'content' => '内容',
            'template' => '指定模板',
            'copyfrom' => '来源',
            'click' => '点击量',
        ];
    }
}