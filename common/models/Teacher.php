<?php

namespace common\models;

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
            'catid' => '栏目ID',
            'name' => '教师姓名',
            'subtitle' => '副标题',
            'thumb' => '缩略图',
            'keywords' => '关键字',
            'description' => '描述',
            'posids' => '是否有推荐位',
            'url' => '链接地址',
            'sort' => '排序',
            'addtime' => '添加时间',
            'updatetime' => '更新时间',
        ];
    }

    /**
     * 获取教师内容
     * @return \yii\db\ActiveQuery
     */
    public function getData()
    {
        return self::hasOne(TeacherData::className(),['id'=>'id']);
    }

    /**
     * 获取栏目名称
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return self::hasOne(Category::className(),['id'=>'catid']);
    }

    /**
     * 获取教师列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($cid = null, $limit = 10, $offset = 0)
    {
        return self::find()->alias('t')
            ->leftJoin('{{%teacher_data}} as d','t.id=d.id')
            ->orderBy('sort desc,id desc')
            ->andFilterWhere(['catid'=>$cid])
            ->limit($limit)->offset($offset)
            ->asArray()->all();
    }
}
