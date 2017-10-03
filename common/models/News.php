<?php

namespace common\models;

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
            'catid' => '栏目ID',
            'title' => '标题',
            'subtitle' => '副标题',
            'thumb' => '缩略图',
            'video' => '视频地址',
            'keywords' => '关键字',
            'description' => '描述',
            'posids' => '是否有推荐位',
            'url' => '链接地址',
            'sort' => '排序',
            'status' => '审核状态',
            'islink' => '是否外部链接',
            'author' => '作者',
            'addtime' => '添加时间',
            'updatetime' => '更新时间',
        ];
    }

}