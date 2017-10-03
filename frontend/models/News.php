<?php

namespace frontend\models;

use Yii;

class News extends \common\models\News
{

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
    public static function getPageList($cid = 1, $curPage = 1, $pageSize = 10)
    {
        //获取当前分类下所有新闻模型子类
        $cids = [];
        $sonCategory = Category::getModelSonList($cid,1);
        if($sonCategory){
            foreach ($sonCategory as $key => $val) {
                $cids[$val['id']] = $val['id'];
            }
        }else{
            $cids[] = $cid;
        }
        //var_dump($cids);

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

}