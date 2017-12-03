<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $phone;
    public $password;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'integer'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            $user->setPassword($this->password);
            return $user->save();
        }else{
            return false;
        }
    }

    /**
     * Finds user by [[phone]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByPhone($this->phone);
        }
        return $this->_user;
    }
}
