<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%ad}}".
 *
 * @property string $id
 * @property integer $pid
 * @property string $title
 * @property string $fileurl
 * @property string $linkurl
 * @property string $content
 * @property string $addtime
 * @property integer $display
 * @property integer $sort
 */
class Ad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ad}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'addtime', 'display', 'sort'], 'integer'],
            [['title'], 'string', 'max' => 80],
            [['fileurl', 'linkurl'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => '广告位ID',
            'title' => '标题',
            'fileurl' => '文件地址',
            'linkurl' => '链接地址',
            'content' => '简介',
            'addtime' => '添加时间',
            'display' => '是否显示：1显示，2隐藏',
            'sort' => '排序',
        ];
    }
}
