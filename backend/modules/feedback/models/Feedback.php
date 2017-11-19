<?php

namespace backend\modules\feedback\models;

use Yii;

class Feedback extends \common\models\Feedback
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'addtime', 'admin_id', 'status'], 'integer'],
            [['name', 'content'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 30],
            [['note'], 'string', 'max' => 50],
        ];
    }

}
