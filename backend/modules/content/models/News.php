<?php

namespace backend\modules\content\models;

use Yii;
use common\models\NewsData;

class News extends \common\models\News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'catid', 'author'], 'required'],
            [['catid', 'posids', 'sort', 'status', 'islink', 'addtime', 'updatetime'], 'integer'],
            [['title', 'subtitle'], 'string', 'max' => 80],
            [['thumb', 'video', 'url'], 'string', 'max' => 100],
            [['keywords'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200],
            [['author'], 'string', 'max' => 30],
            [['sort'], 'default', 'value' => 0],
        ];
    }

    /**
     * 获取文章内容
     * @return \yii\db\ActiveQuery
     */
    public function getData()
    {
        return self::hasOne(NewsData::className(), ['id' => 'id']);
    }

    /**
     * 获取栏目名称
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return self::hasOne(Category::className(), ['id' => 'catid']);
    }


}