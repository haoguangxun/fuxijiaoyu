<?php

namespace backend\modules\content\models;

use Yii;

/**
 * This is the model class for table "{{%position}}".
 *
 * @property integer $posid
 * @property integer $modelid
 * @property integer $catid
 * @property string $name
 * @property integer $maxnum
 * @property integer $sort
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%position}}';
    }

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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'posid' => '推荐位ID',
            'modelid' => '模型ID',
            'catid' => '栏目ID',
            'name' => '推荐位名称',
            'maxnum' => '最大保存条数',
            'sort' => '排序',
        ];
    }
}
