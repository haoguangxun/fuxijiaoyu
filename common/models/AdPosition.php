<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%ad_position}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $width
 * @property integer $height
 * @property integer $type
 * @property integer $disabled
 */
class AdPosition extends \yii\db\ActiveRecord
{
    public static $type = [
        '1' => '文字',
        '2' => '图片',
        '3' => 'Flash',
        '4' => '视频',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ad_position}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'disabled' => '是否禁用：0启用，1禁用',
        ];
    }
}
