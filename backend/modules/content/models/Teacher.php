<?php

namespace backend\modules\content\models;

use Yii;

/**
 * This is the model class for table "{{%teacher}}".
 *
 * @property string $id
 * @property integer $catid
 * @property string $name
 * @property string $subtitle
 * @property string $thumb
 * @property string $keywords
 * @property string $description
 * @property integer $posids
 * @property string $url
 * @property string $sort
 * @property string $addtime
 * @property string $updatetime
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%teacher}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catid', 'posids', 'sort', 'addtime', 'updatetime'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['subtitle'], 'string', 'max' => 80],
            [['thumb', 'url'], 'string', 'max' => 100],
            [['keywords'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200],
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
            'name' => 'Name',
            'subtitle' => 'Subtitle',
            'thumb' => 'Thumb',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'posids' => 'Posids',
            'url' => 'Url',
            'sort' => 'Sort',
            'addtime' => 'Addtime',
            'updatetime' => 'Updatetime',
        ];
    }
}
