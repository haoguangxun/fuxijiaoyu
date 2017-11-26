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
            [['auth_key', 'password', 'email'], 'string', 'max' => 100],
            [['password_reset_token', 'email_validate_token'], 'string', 'max' => 255],
            [['photo'], 'string', 'max' => 100],
            [['phone'], 'unique'],
        ];
    }

}
