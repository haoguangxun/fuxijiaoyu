<?php

namespace backend\modules\ad\models;

use Yii;

class AdPosition extends \common\models\AdPosition
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'disabled'], 'required'],
            [['width', 'height', 'type', 'disabled'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '广告位名称',
            'width' => '宽度',
            'height' => '高度',
            'type' => '类型',
            'disabled' => '是否启用',
        ];
    }
}
