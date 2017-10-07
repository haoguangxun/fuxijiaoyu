<?php

namespace frontend\models;

use common\models\CourseData;
use Yii;

class Course extends \common\models\Course
{

    /**
     * 获取课程列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($cid = null, $limit = 10, $offset = 0)
    {
        return self::find()->alias('n')
            ->leftJoin('{{%course_data}} as d', 'n.id=d.id')
            ->orderBy('sort desc,id desc')
            ->andFilterWhere(['catid'=>$cid])
            ->limit($limit)->offset($offset)
            ->asArray()->all();

    }

    /**
     * 分页获取课程列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getPageList($cid = 15, $curPage = 1, $pageSize = 10)
    {
        //获取当前分类下所有课程模型子类
        $cids = [$cid];
        $sonCategory = Category::getModelSonList($cid,3);
        if($sonCategory){
            foreach ($sonCategory as $key => $val) {
                $cids[$val['id']] = $val['id'];
            }
        }

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
