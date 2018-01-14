<?php
namespace frontend\models;

use common\models\MemberData;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $phone;
    public $password;
    public $regip;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => '该手机号已经注册！'],
            ['phone', 'integer'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['regip', 'default', 'value' => ip2long($_SERVER["REMOTE_ADDR"])],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->phone = $this->phone;
        $user->regip = $this->regip;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if($user->save()){
            /*$userid = $user->attributes['id'];
            $member_data = new MemberData();
            $member_data->userid->$userid;
            $member_data->save();*/
            return $user;
        }else{
            return null;
        }

    }
}
