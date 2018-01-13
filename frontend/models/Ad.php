<?php

namespace frontend\models;

use Yii;

class Ad extends \yii\db\ActiveRecord
{
    /**
     * 获取广告列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($pid = null)
    {
        if(empty($pid)) return false;
        return self::find()
            ->orderBy(['sort'=>SORT_ASC])
            ->where(['pid'=>$pid])
            ->asArray()->all();

    }
}
