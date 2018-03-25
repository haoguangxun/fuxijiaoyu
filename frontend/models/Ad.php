<?php

namespace frontend\models;

use Yii;

class Ad extends \yii\db\ActiveRecord
{
    /**
     * 获取广告列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($pid = null,$limit = 100)
    {
        if(empty($pid)) return false;
        return self::find()
            ->orderBy(['sort'=>SORT_ASC])
            ->where(['pid'=>$pid,'display'=>1])
            ->limit($limit)
            ->asArray()->all();

    }
}
