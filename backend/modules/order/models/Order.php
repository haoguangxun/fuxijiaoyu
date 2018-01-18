<?php
namespace backend\modules\order\models;

use backend\modules\member\models\Member;
use backend\modules\content\models\Course;
use Yii;

class Order extends \common\models\Order
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'pay_type', 'pay_number'], 'required'],
            [['courseid', 'userid', 'addtime', 'paytime', 'pay_number', 'pay_type', 'status'], 'integer'],
            [['amount'], 'number'],
            [['orderid'], 'string', 'max' => 30],
            [['note'], 'string', 'max' => 50],
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

    /**
     * 获取学生姓名
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return self::hasOne(Member::className(),['id'=>'userid']);
    }
}
