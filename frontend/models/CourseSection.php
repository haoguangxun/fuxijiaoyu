<?php

namespace frontend\models;

use Yii;

class CourseSection extends \common\models\CourseSection
{

    /**
     * 获取课程小节列表
     */
    public static function getList($cid)
    {
        return self::find()->where(['courseid'=>intval($cid)])->orderBy('sort desc,id desc')->asArray()->all();
    }

    /**
     * 获取课程小节详情
     */
    public static function getData($id)
    {
        return self::find()->where(['id'=>intval($id)])->asArray()->one();
    }
}
