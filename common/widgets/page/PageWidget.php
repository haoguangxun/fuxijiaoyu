<?php
/**
 * 单页图文显示组件
 */
namespace common\widgets\page;

use Yii;
use common\models\Page;
use yii\base\Widget;

class PageWidget extends Widget
{
    /**
     * @var 栏目ID
     */
    public $cid;

    public function run(){

        $model = new Page();
        if($this->cid){

            $data= $model::find()
                ->where(['catid' => intval($this->cid)])
                ->asArray()
                ->one();

        }else{
            $data = array();
        }
        return $this->render('index',['data'=>$data]);
    }

}