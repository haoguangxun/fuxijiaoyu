<?php

namespace backend\modules\content\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property string $id
 * @property integer $catid
 * @property string $title
 * @property string $subtitle
 * @property string $thumb
 * @property string $video
 * @property string $keywords
 * @property string $description
 * @property integer $posids
 * @property string $url
 * @property string $sort
 * @property integer $status
 * @property integer $islink
 * @property string $author
 * @property string $addtime
 * @property string $updatetime
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catid', 'posids', 'sort', 'status', 'islink', 'addtime', 'updatetime'], 'integer'],
            [['title', 'subtitle'], 'string', 'max' => 80],
            [['thumb', 'video', 'url'], 'string', 'max' => 100],
            [['keywords'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200],
            [['author'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catid' => 'Catid',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'thumb' => 'Thumb',
            'video' => 'Video',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'posids' => 'Posids',
            'url' => 'Url',
            'sort' => 'Sort',
            'status' => 'Status',
            'islink' => 'Islink',
            'author' => 'Author',
            'addtime' => 'Addtime',
            'updatetime' => 'Updatetime',
        ];
    }
}
