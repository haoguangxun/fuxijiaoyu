<?php

namespace frontend\models;

use Yii;

class Teacher extends \common\models\Teacher
{

    /**
     * 获取教师列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($cid = null, $limit = 10, $offset = 0)
    {
        return self::find()->alias('t')
            ->leftJoin('{{%teacher_data}} as d','t.id=d.id')
            ->orderBy('sort desc,id desc')
            ->andFilterWhere(['catid'=>$cid])
            ->limit($limit)->offset($offset)
            ->asArray()->all();
    }
}
