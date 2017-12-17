<?php

namespace common\models;

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
            'catid' => '栏目ID',
            'name' => '课程名称',
            'subtitle' => '副标题',
            'teacherid' => '主讲老师ID',
            'thumb' => '缩略图',
            'keywords' => '关键字',
            'description' => '描述',
            'price' => '价格',
            'difficulty_level' => '难度等级',
            'course_number' => '每期课程节数',
            'course_duration' => '每节课程时长',
            'posids' => '是否有推荐位',
            'url' => '链接地址',
            'sort' => '排序',
            'status' => '状态',
            'sales' => '学生数量',
            'islink' => '是否外部链接',
            'author' => '作者',
            'addtime' => '添加时间',
            'updatetime' => '更新时间',
        ];
    }

}
