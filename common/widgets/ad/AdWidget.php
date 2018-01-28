<?php
/**
 * 广告显示组件
 */
namespace common\widgets\ad;

use Yii;
use common\models\Ad;
use yii\base\Widget;

class AdWidget extends Widget
{
    /**
     * @var 广告位ID
     */
    public $pid;

    /**
     * @var 类型
     */
    public $type = 2;

    /**
     * @var 显示条数
     */
    public $num = 1;

    public function run(){

        $model = new Ad();
        if($this->pid){

            $data= $model::find()
                ->where([
                    'display' => 1,
                    'pid' => intval($this->pid)
                ])
                ->orderBy(['sort'=>SORT_ASC])
                ->limit($this->num)
                ->asArray()
                ->all();

        }else{
            $data = array();
        }

        return $this->render('index',['data'=>$data,'type'=>$this->type]);
    }

}