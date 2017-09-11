<?php

namespace backend\modules\content\models;

use Yii;

/**
 * This is the model class for table "{{%course}}".
 *
 * @property string $id
 * @property integer $catid
 * @property string $name
 * @property string $subtitle
 * @property integer $teacherid
 * @property string $thumb
 * @property string $keywords
 * @property string $description
 * @property string $price
 * @property integer $difficulty_level
 * @property integer $course_number
 * @property integer $course_duration
 * @property integer $posids
 * @property string $url
 * @property string $sort
 * @property integer $status
 * @property integer $islink
 * @property string $author
 * @property string $addtime
 * @property string $updatetime
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catid', 'teacherid', 'difficulty_level', 'course_number', 'course_duration', 'posids', 'sort', 'status', 'islink', 'addtime', 'updatetime'], 'integer'],
            [['price'], 'number'],
            [['name', 'subtitle'], 'string', 'max' => 80],
            [['thumb', 'url'], 'string', 'max' => 100],
            [['keywords'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200],
            [['author'], 'string', 'max' => 30],
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
            'teacherid' => 'Teacherid',
            'thumb' => 'Thumb',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'price' => 'Price',
            'difficulty_level' => 'Difficulty Level',
            'course_number' => 'Course Number',
            'course_duration' => 'Course Duration',
            'posids' => 'Posids',
            'url' => 'Url',
            'sort' => 'Sort',
            'status' => 'Status',
            'islink' => 'Islink',
            'author' => 'Author',
            'addtime' => 'Addtime',
            'updatetime' => 'Updatetime',
        ];
    }
}
