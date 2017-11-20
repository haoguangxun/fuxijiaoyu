<?php

namespace backend\modules\content\models;

use Yii;
use common\models\CourseData;
use backend\modules\member\models\Member;

class Course extends \common\models\Course
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catid', 'teacherid', 'difficulty_level', 'course_number', 'course_duration', 'posids', 'sort', 'status', 'islink', 'addtime', 'updatetime'], 'integer'],
            [['price'], 'number'],
            [['name', 'subtitle'], 'string', 'max' => 80],
            [['thumb', 'url'], 'string', 'max' => 100],
            [['keywords'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200],
            [['author'], 'string', 'max' => 30],
        ];
    }

    /**
     * 获取课程内容
     * @return \yii\db\ActiveQuery
     */
    public function getData()
    {
        return self::hasOne(CourseData::className(),['id'=>'id']);
    }

    /**
     * 获取栏目名称
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return self::hasOne(Category::className(),['id'=>'catid']);
    }

    /**
     * 获取老师名称
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return self::hasOne(Member::className(),['userid'=>'teacherid']);
    }

}
