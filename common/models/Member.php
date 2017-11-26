<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%member}}".
 *
 * @property string $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email_validate_token
 * @property string $nickname
 * @property string $realname
 * @property string $sex
 * @property string $photo
 * @property string $phone
 * @property string $email
 * @property integer $type
 * @property string $amount
 * @property integer $point
 * @property string $created_at
 * @property string $updated_at
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
            [['sex','phone', 'type', 'point', 'created_at', 'updated_at', 'login_at', 'regip', 'lastip', 'loginnum', 'islock', 'vip', 'overduedate'], 'integer'],
            [['amount'], 'number'],
            [['username', 'nickname', 'realname'], 'string', 'max' => 20],
            [['auth_key', 'password_hash', 'email'], 'string', 'max' => 100],
            [['password_reset_token', 'email_validate_token'], 'string', 'max' => 255],
            [['photo'], 'string', 'max' => 100],
            [['phone'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户ID',
            'username' => '用户名',
            'auth_key' => '自动登录key',
            'password_hash' => '密码',
            'password_reset_token' => '重置密码token',
            'email_validate_token' => '邮箱验证token',
            'nickname' => '昵称',
            'realname' => '姓名',
            'sex' => '性别',
            'photo' => '头像',
            'phone' => '手机号',
            'email' => '邮箱',
            'type' => '类型',
            'amount' => '金钱',
            'point' => '积分',
            'created_at' => '注册时间',
            'update_at' => '修改时间',
            'login_at' => '最后登录时间',
            'regip' => '注册ip',
            'lastip' => '上次登录ip',
            'loginnum' => '登录次数',
            'islock' => '是否锁定',
            'vip' => 'VIP等级',
            'overduedate' => 'VIP过期时间',
        ];
    }
}
