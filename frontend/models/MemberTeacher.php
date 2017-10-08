<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%member_teacher}}".
 *
 * @property string $userid
 * @property string $realname
 * @property integer $sex
 * @property string $hobby
 */
class MemberTeacher extends \common\models\MemberTeacher
{

    /**
     * 获取教师会员列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList()
    {
        $data = self::find()->alias('t')
            ->select('t.*,m.*')
            ->leftJoin('{{%member}} as m', 't.userid=m.userid')
            ->asArray()->all();
        return ArrayHelper::index($data,'userid');
    }

    /**
     * 获取教师详情
     * @param $id
     * @return array
     */
    public static function getData($id)
    {
        return self::find()->alias('t')
            ->select('t.*,m.*')
            ->leftJoin('{{%member}} as m', 't.userid=m.userid')
            ->where(['t.userid'=>$id])
            ->asArray()->one();
    }

}
