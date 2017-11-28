<?php

namespace backend\modules\member\models;

use Yii;

class Member extends \common\models\Member
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex','phone', 'type', 'point', 'created_at', 'login_at', 'regip', 'lastip', 'loginnum', 'islock', 'vip', 'overduedate'], 'integer'],
            [['amount'], 'number'],
            [['username', 'nickname', 'realname'], 'string', 'max' => 20],
            [['phone'], 'unique'],
        ];
    }

}
