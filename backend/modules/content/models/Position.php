<?php

namespace backend\modules\content\models;

use Yii;

class Position extends \common\models\Position
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modelid', 'catid', 'maxnum', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 30],
        ];
    }
}
