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
     * 获取课程名称
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return self::hasOne(Course::className(),['id'=>'courseid']);
    }

}
