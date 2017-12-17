<?php

namespace frontend\models;

use Yii;

class CourseCollection extends \common\models\CourseCollection
{

    /**
     * 获取课程信息
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return self::hasOne(Course::className(),['id'=>'courseid']);
    }
}
