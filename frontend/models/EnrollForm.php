<?php

namespace frontend\models;

use Yii;

class EnrollForm extends \common\models\Enroll
{

    public function rules()
    {
        return [
            [['learn', 'learning_level', 'name', 'contact', 'expect_teacher'], 'required'],
            [['learn', 'learning_level'], 'integer'],
            [['name', 'contact'], 'string', 'max' => 20],
            [['expect_teacher'], 'string', 'max' => 30],
        ];
    }

    /**
     * 报名
     */
    public function post()
    {
        $this->addtime = time();
        if($this->save()){
            return true;
        }
        return false;
    }
}
