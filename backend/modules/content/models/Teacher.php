<?php

namespace backend\modules\content\models;

use Yii;
use common\models\TeacherData;

class Teacher extends \common\models\Teacher
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catid', 'posids', 'sort', 'addtime', 'updatetime'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['subtitle'], 'string', 'max' => 80],
            [['thumb', 'url'], 'string', 'max' => 100],
            [['keywords'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200],
            [['sort'], 'default', 'value' => 0],
        ];
    }

    /**
     * 获取教师内容
     * @return \yii\db\ActiveQuery
     */
    public function getData()
    {
        return self::hasOne(TeacherData::className(),['id'=>'id']);
    }

    /**
     * 获取栏目名称
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return self::hasOne(Category::className(),['id'=>'catid']);
    }

}
