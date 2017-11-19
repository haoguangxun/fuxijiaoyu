<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%member}}".
 *
 * @property string $userid
 * @property string $username
 * @property string $auth_key
 * @property string $password
 * @property string $password_reset_token
 * @property string $email_validate_token
 * @property string $nickname
 * @property string $photo
 * @property string $phone
 * @property string $email
 * @property integer $type
 * @property string $amount
 * @property integer $point
 * @property string $regtime
 * @property string $lasttime
 * @property integer $regip
 * @property integer $lastip
 * @property integer $loginnum
 * @property integer $islock
 * @property integer $vip
 * @property string $overduedate
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'type', 'point', 'regtime', 'lasttime', 'regip', 'lastip', 'loginnum', 'islock', 'vip', 'overduedate'], 'integer'],
            [['amount'], 'number'],
            [['username', 'nickname'], 'string', 'max' => 20],
            [['auth_key', 'password', 'email'], 'string', 'max' => 32],
            [['password_reset_token', 'email_validate_token'], 'string', 'max' => 255],
            [['photo'], 'string', 'max' => 100],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => '用户ID',
            'username' => '用户名',
            'auth_key' => '自动登录key',
            'password' => '密码',
            'password_reset_token' => '重置密码token',
            'email_validate_token' => '邮箱验证token',
            'nickname' => '昵称',
            'photo' => '头像',
            'phone' => '手机号',
            'email' => '邮箱',
            'type' => '用户类型：1学生，2教师',
            'amount' => '金钱',
            'point' => '积分',
            'regtime' => '注册时间',
            'lasttime' => '最后登录时间',
            'regip' => '注册ip',
            'lastip' => '上次登录ip',
            'loginnum' => '登录次数',
            'islock' => '是否锁定：0未锁定，1已锁定',
            'vip' => 'VIP等级',
            'overduedate' => 'VIP过期时间',
        ];
    }
}
