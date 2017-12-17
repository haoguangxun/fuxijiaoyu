<?php

namespace frontend\models;

use common\models\CourseData;
use Yii;

class Course extends \common\models\Course
{
    public $userid;
    /**
     * 获取课程列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($cid = null, $limit = 10, $offset = 0, $order = 'sort desc,id desc')
    {
        return self::find()
            ->orderBy($order)
            ->andFilterWhere(['catid'=>$cid])
            ->limit($limit)->offset($offset)
            ->asArray()->all();

    }

    /**
     * 获取热门课程列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getHotList($cid = 15, $limit = 3)
    {
        //获取当前分类下所有课程模型子类ID
        $cids = Category::getModelSonCid($cid,3);

        $data = self::find()
            ->orderBy('sales desc')
            ->where(['in', 'catid', $cids])
            ->limit($limit)
            ->asArray()->all();

        return $data;

    }

    /**
     * 分页获取课程列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getPageList($cid = 15, $curPage = 1, $pageSize = 10)
    {
        //获取当前分类下所有课程模型子类ID
        $cids = Category::getModelSonCid($cid,3);

        $data['count'] = self::find()->where(['in', 'catid', $cids])->count();
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
            ->where(['in', 'catid', $cids])
            ->limit($pageSize)->offset(($curPage-1)*$pageSize)
            ->asArray()->all();

        return $data;

    }

    /**
     * 获取课程详情
     * @param $id
     * @return array
     */
    public static function getData($id)
    {
        $news = self::find()->where(['id'=>intval($id)])->asArray()->one();
        $newsData = CourseData::find()->where(['id'=>intval($id)])->asArray()->one();
        if($news && $newsData){
            $data = array_merge($news,$newsData);
        }
        return $data ? $data : [];
    }

    /**
     * 展示量+1
     * @param $id
     * @throws \yii\db\Exception
     */
    public static function clickNum($id)
    {
        Yii::$app->db->createCommand('UPDATE {{%course_data}} SET click=click+1 WHERE id=:id')
            ->bindValue('id',$id)->execute();
    }

}
