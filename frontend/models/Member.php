<?php

namespace frontend\models;

use common\models\MemberData;
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
            ->leftJoin('{{%member_data}} as d', 'm.id=d.userid')
            ->where('type = 2')
            ->asArray()->all();
        return ArrayHelper::index($data,'id');
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
            ->leftJoin('{{%member_data}} as d', 'm.id=d.userid')
            ->where(['d.userid'=>$id])
            ->asArray()->one();
    }

    /**
     * 保存会员资料
     */
    public function saveData($data)
    {
        //var_dump($data);exit;
        //主表
        $model = $this->findOne(Yii::$app->user->identity->id);
        $model->realname = $data['realname'];
        $model->sex = $data['sex'];
        $model->photo = $data['photo'];
        //副表
        //$data_model = MemberData::findOne(Yii::$app->user->identity->id);
        $data_model = MemberData::find()->where('userid='.Yii::$app->user->identity->id)->one();
        $data_model->hobby = $data['hobby'];
        $data_model->title = !empty($data['title']) ? $data['title'] : '';
        $data_model->vitae = !empty($data['vitae']) ? $data['vitae'] : '';
        //var_dump($data_model);exit;

        if($model->save() && $data_model->save()){
            return true;
        }
        return false;

    }

}
