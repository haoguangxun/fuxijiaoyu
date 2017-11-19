<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

class Member extends \common\models\Member
{

    /**
     * 获取教师会员列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getTeacherList()
    {
        $data = self::find()->alias('m')
            ->select('m.*,d.*')
            ->leftJoin('{{%member_data}} as d', 'm.userid=d.userid')
            ->where('type = 2')
            ->asArray()->all();
        return ArrayHelper::index($data,'userid');
    }

    /**
     * 获取会员详情
     * @param $id
     * @return array
     */
    public static function getData($id)
    {
        return self::find()->alias('m')
            ->select('m.*,d.*')
            ->leftJoin('{{%member_data}} as d', 'm.userid=d.userid')
            ->where(['d.userid'=>$id])
            ->asArray()->one();
    }

}
