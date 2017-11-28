<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property string $id
 * @property string $orderid
 * @property string $courseid
 * @property string $userid
 * @property string $amount
 * @property string $addtime
 * @property string $paytime
 * @property string $pay_number
 * @property integer $pay_type
 * @property string $note
 * @property integer $status
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

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
}
