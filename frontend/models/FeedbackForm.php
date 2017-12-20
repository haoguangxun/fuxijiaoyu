<?php

namespace frontend\models;

use Yii;

class FeedbackForm extends \common\models\Feedback
{

    public function rules()
    {
        return [
            [['phone', 'name', 'content', 'email'], 'required'],
            [['phone'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['content'], 'string', 'max' => 200],
            [['email'], 'email'],
        ];
    }

    /**
     * 留言
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
