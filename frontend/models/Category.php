<?php

namespace frontend\models;

use Yii;


class Category extends \common\models\Category
{

    /**
     * 根据栏目id获得所有下级子类id的数据
     * @param $id
     * @return array
     */
    public static function getSonList($id){
        $list = [];
        $info = self::find()->select('child,arrchildid')->where(['id'=>$id])->asArray()->one();
        if($info['child'] == 1){
            $sonIds = explode(',',$info['arrchildid']);
            $list = self::find()->where(['in','id',$sonIds])->asArray()->all();
        }
        return $list;
    }

    /**
     * 根据栏目id获得指定模型的下级子类的数据
     * @param $id
     * @param $mid
     * @return array
     */
    public static function getModelSonList($id, $mid){
        $list = self::getSonList($id);
        foreach ($list as $key => $val) {
            if($val['modelid'] != $mid){
                unset($list[$key]);
            }
        }
        return $list;
    }


}
