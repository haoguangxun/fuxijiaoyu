<?php

namespace backend\modules\content\models;

use Yii;

class Category extends \common\models\Category
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'catname', 'keywords', 'description'], 'required'],
            [['type', 'modelid', 'parentid', 'child', 'sort', 'ismenu'], 'integer'],
            [['setting'], 'string'],
            [['arrparentid', 'arrchildid'], 'string', 'max' => 200],
            [['catname', 'catdir'], 'string', 'max' => 30],
            [['pic', 'parentdir', 'url'], 'string', 'max' => 100],
            [['keywords'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * 获得栏目类型与所属模型
     */
    public static function getModelType($type,$modelid)
    {
        if($type == 1){
            return '单网页';
        }else{
            $model = Models::findOne($modelid);
            return $model['name'];
        }
    }

}
