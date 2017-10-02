<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property string $id
 * @property integer $catid
 * @property string $title
 * @property string $subtitle
 * @property string $thumb
 * @property string $video
 * @property string $keywords
 * @property string $description
 * @property integer $posids
 * @property string $url
 * @property string $sort
 * @property integer $status
 * @property integer $islink
 * @property string $author
 * @property string $addtime
 * @property string $updatetime
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'catid', 'author'], 'required'],
            [['catid', 'posids', 'sort', 'status', 'islink', 'addtime', 'updatetime'], 'integer'],
            [['title', 'subtitle'], 'string', 'max' => 80],
            [['thumb', 'video', 'url'], 'string', 'max' => 100],
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
            'title' => '标题',
            'subtitle' => '副标题',
            'thumb' => '缩略图',
            'video' => '视频地址',
            'keywords' => '关键字',
            'description' => '描述',
            'posids' => '是否有推荐位',
            'url' => '链接地址',
            'sort' => '排序',
            'status' => '审核状态',
            'islink' => '是否外部链接',
            'author' => '作者',
            'addtime' => '添加时间',
            'updatetime' => '更新时间',
        ];
    }

    /**
     * 获取文章内容
     * @return \yii\db\ActiveQuery
     */
    public function getData()
    {
        return self::hasOne(NewsData::className(), ['id' => 'id']);
    }

    /**
     * 获取栏目名称
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return self::hasOne(Category::className(), ['id' => 'catid']);
    }

    /**
     * 获取文章列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($cid = null, $limit = 10, $offset = 0)
    {
        return self::find()->alias('n')
            ->leftJoin('{{%news_data}} as d', 'n.id=d.id')
            ->orderBy('sort desc,id desc')
            ->andFilterWhere(['catid'=>$cid])
            ->limit($limit)->offset($offset)
            ->asArray()->all();

    }

    /**
     * 分页获取文章列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getPageList($cid = null, $curPage = 1, $pageSize = 10)
    {
        $data['count'] = self::find()->andFilterWhere(['catid'=>$cid])->count();
        if(!$data['count']){
            return $data = ['count'=>0,'curPage'=>$curPage,'pageSize'=>$pageSize,'start'=>0,'end'=>'0','data'=>[]];
        }
        if(ceil($data['count']/$pageSize)<$curPage){
            $curPage = ceil($data['count']/$pageSize);
        }
        $data['curPage'] = $curPage;
        $data['pageSize'] = $pageSize;
        $data['start'] = ($curPage-1)*$pageSize+1;
        $data['end'] = $curPage*$pageSize;
        $data['data'] = self::find()
            ->orderBy('sort desc,id desc')
            ->andFilterWhere(['catid'=>$cid])
            ->limit($pageSize)->offset(($curPage-1)*$pageSize)
            ->asArray()->all();

        return $data;

    }

}