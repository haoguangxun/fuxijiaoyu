<?php

namespace backend\modules\admin\models\form;

use Yii;
use backend\modules\admin\models\User;
use yii\base\Model;

/**
 * Description of ChangePassword
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class ChangePassword extends Model
{
    public $oldPassword;
    public $newPassword;
    public $retypePassword;
    private $_user = null;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['newPassword'], 'required'],
            [['newPassword'], 'string', 'min' => 6],
        ];
    }


    /**
     * Change password.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function change()
    {
        if ($this->validate()) {
            /* @var $user User */
            //$user = Yii::$app->user->identity;//要求登录
            $user = $this->_getModel();
            $user->setPassword($this->newPassword);
            $user->generateAuthKey();
            if ($user->save()) {
                return true;
            }
        }

        return false;
    }
    
    private function _getModel()
    {
        if( $this->_user==null ) {
            $id = intval(Yii::$app->request->get('id',0));
            $this->_user = User::findOne($id);
        }
        
        return $this->_user;
    }
    
    public function getUsername()
    {
        $user = $this->_getModel();
                
        return !empty($user['username']) ? $user['username'] : '';
    }
    
}
