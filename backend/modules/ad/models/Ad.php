<?php

namespace backend\modules\ad\models;

use Yii;

class Ad extends \common\models\Ad
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'title', 'content'], 'required'],
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
            'display' => '是否显示',
            'sort' => '排序',
        ];
    }
}
