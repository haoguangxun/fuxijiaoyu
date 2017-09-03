<?php
namespace backend\modules\admin\models\form;

use Yii;
use yii\base\Model;
use backend\modules\admin\models\User;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

/**
 * Create user form
 */
class UserForm extends Model
{
    public $username;
    //public $email;
    public $description;
    public $password;
    public $status;
    public $roles;
    //public $id;
    public $roleid;
    private $model;
    
    
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => User::className(), 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],
            ['username', 'string', 'min' => 2, 'max' => 255],

          /*   ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass'=> User::className(), 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }], */

            ['password', 'required', 'on' => 'create'],
       
            ['password', 'string', 'min' => 6],
            ['description', 'string', 'length' => [0, 100]],
            [['status'], 'integer'],
            //['roles','in', 'range' => array_keys(User::roleLists())],
            ['roleid','integer'],
           // ['roles', 'required', 'on' => 'assign=role-validate-form'], //会在前端对应lable下显示error
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('rbac-admin', 'Username'),
            'email' => 'Email',
            'status' => 'Status',
            'password' => 'Password',
            'roleid' => '分配权限'
        ];
    }

    /**
     * @param User $model
     * @return mixed
     */
    public function setModel($model)
    {
        $this->username = $model->username;
        //$this->email = $model->email;
        //$this->status = $model->status;
        //$this->id = $model->id;
        $this->model = $model;
      /*   $this->roles = ArrayHelper::getColumn(
            Yii::$app->authManager->getRolesById($model->getRoleId()),
            'name'
        ); */
     
        $role = Yii::$app->authManager->getRolesById($model->getRoleId());
        $this->roles = '';
        if(!empty($role)) {
        
            $this->roles = $role['name'];
        }
        return $this->model;
    }

    /**
     * @return User
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }

    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function save()
    {
        if ($this->validate()) {
            $model = $this->getModel();
            $model->username = $this->username;
            $model->status = $this->status;
            //$model->email = $this->email;
            $model->description = $this->description;
            $model->roleid = $this->roleid;
            if ($this->password) {
                $model->setPassword($this->password);
                $model->generateAuthKey();
            }
            if (!$model->save()) {
                throw new Exception('Model not saved');
            }

            return !$model->hasErrors();
        }
        return null;
    }
}
