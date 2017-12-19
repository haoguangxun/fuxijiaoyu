<?php

namespace frontend\models;

use Yii;

class Order extends \common\models\Order
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['courseid', 'userid', 'addtime', 'paytime', 'pay_number', 'pay_type', 'status'], 'integer'],
            [['amount'], 'number'],
            [['orderid'], 'string', 'max' => 30],
            [['note'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderid' => '订单号',
            'courseid' => '课程ID',
            'userid' => '学生ID',
            'amount' => '金额',
            'addtime' => '报名时间',
            'paytime' => '支付时间',
            'pay_number' => '交易流水号',
            'pay_type' => '支付方式',
            'note' => '备注',
            'status' => '支付状态',
        ];
    }

    /**
     * 获取学员是否购买过此课程
     * $course 课程信息
     */
    public static function getSignup($courseid)
    {
        $order = self::find()->where(['userid'=>Yii::$app->user->identity->id, 'courseid'=>$courseid, 'status'=>1])->asArray()->one();
        if($order){
            return true;
        }
        return false;
    }

    /**
     * 根据订单号获取订单信息
     */
    public function getOrder($orderid)
    {
        return self::find()->where(['orderid'=>$orderid])->asArray()->one();
    }

    /**
     * 根据订单号修改订单状态
     */
    public function updateOrderStatus($orderid,$status,$pay_number)
    {
        if(empty($orderid) || empty($status) || empty($pay_number)){
            return false;
        }
        $model = self::find()->where(['orderid'=>$orderid])->one();
        $model->status = $status;
        $model->pay_number = $pay_number;
        $model->paytime = time();
        if($model->save()){
            return true;
        }
        return false;
    }

    /**
     * 获取课程名称
     */
    public function getCourse()
    {
        return self::hasOne(Course::className(),['id'=>'courseid']);
    }

    /**
     * 课程报名
     * $course 课程信息
     */
    public function post($course)
    {
        $order = self::find()->where(['userid'=>Yii::$app->user->identity->id, 'courseid'=>$course['id']])->asArray()->one();
        if($order){
            return $order['orderid'];
        }
        $this->orderid = date('YmdHis',time()) . mt_rand(1000,9999);
        $this->courseid = $course['id'];
        $this->userid = Yii::$app->user->identity->id;
        $this->amount = $course['price'];
        $this->addtime = time();
        $this->status = 0;

        if($this->save()){
            return $this->orderid;
        }
        return false;
    }

}
