<?php

namespace backend\modules\content\models;

use Yii;

/**
 * This is the model class for table "{{%position_data}}".
 *
 * @property string $id
 * @property integer $catid
 * @property integer $posid
 * @property integer $modelid
 * @property integer $thumb
 * @property string $data
 * @property string $sort
 */
class PositionData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%position_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'catid', 'posid', 'modelid', 'thumb', 'sort'], 'integer'],
            [['data'], 'required'],
            [['data'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catid' => 'Catid',
            'posid' => 'Posid',
            'modelid' => 'Modelid',
            'thumb' => 'Thumb',
            'data' => 'Data',
            'sort' => 'Sort',
        ];
    }
}
