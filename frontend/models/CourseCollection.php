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

    /**
     * 获取课程收藏数量
     * @return \yii\db\ActiveQuery
     */
    public static function getNum($id)
    {
        if(empty($id)) return 0;
        $num = self::find()->where(['courseid'=>$id])->count();
        return $num ? $num : 0;
    }

    /**
     * 获取当前用户是否收藏此课程
     * @return \yii\db\ActiveQuery
     */
    public static function getUserCollection($id)
    {
        if(empty($id) || empty(Yii::$app->user->identity->id)) return false;
        $model = self::find()->where(['courseid'=>$id,'userid'=>Yii::$app->user->identity->id])->one();
        if($model){
            return true;
        }
        return false;
    }

    /**
     * 添加收藏
     */
    public function add($id)
    {
        if(empty($id) || empty(Yii::$app->user->identity->id)) return false;
        $model = self::find()->where(['courseid'=>$id,'userid'=>Yii::$app->user->identity->id])->one();
        if($model){
            return true;
        }
        $model = new CourseCollection();
        $model->courseid = $id;
        $model->userid = Yii::$app->user->identity->id;
        if($model->save()){
            return true;
        }
        return false;
    }

    /**
     * 取消收藏
     */
    public function del($id)
    {
        if(empty($id) || empty(Yii::$app->user->identity->id)) return false;
        $model = self::find()->where(['courseid'=>$id,'userid'=>Yii::$app->user->identity->id])->one();
        if(empty($model) || $model->delete()){
            return true;
        }
        return false;
    }

}
