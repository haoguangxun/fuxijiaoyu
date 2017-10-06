<?php

namespace frontend\models;

use common\models\TeacherData;
use Yii;

class Teacher extends \common\models\Teacher
{

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

    /**
     * 分页获取教师列表
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getPageList($cid = 2, $curPage = 1, $pageSize = 10)
    {
        //获取当前分类下所有教师模型子类
        $cids = [$cid];
        $sonCategory = Category::getModelSonList($cid,2);
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
     * 获取教师详情
     * @param $id
     * @return array
     */
    public static function getData($id)
    {
        $teacher = self::find()->where(['id'=>intval($id)])->asArray()->one();
        $teacherData = TeacherData::find()->where(['id'=>intval($id)])->asArray()->one();
        if($teacher && $teacherData){
            $data = array_merge($teacher,$teacherData);
        }
        return $data ? $data : [];
    }

}
