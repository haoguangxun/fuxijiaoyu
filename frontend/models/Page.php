<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

class Page extends \common\models\Page
{

    /**
     * 获取单网页内容
     * @return array
     */
    public static function getData($id = null)
    {
        if(!empty($id)){
            return self::find()->where(['catid'=>$id])->asArray()->one();
        }else{
            $data = self::find()->asArray()->all();
            return ArrayHelper::index($data,'catid');
        }
    }
}
