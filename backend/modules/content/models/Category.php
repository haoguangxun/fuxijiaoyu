<?php

namespace backend\modules\content\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property integer $modelid
 * @property integer $parentid
 * @property string $arrparentid
 * @property integer $child
 * @property string $arrchildid
 * @property string $catname
 * @property string $pic
 * @property string $description
 * @property string $parentdir
 * @property string $catdir
 * @property string $url
 * @property string $setting
 * @property integer $sort
 * @property integer $ismenu
 */
class Category extends \yii\db\ActiveRecord
{
    public static $treeList = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'modelid', 'parentid', 'child', 'sort', 'ismenu'], 'integer'],
            [['setting'], 'required'],
            [['setting'], 'string'],
            [['arrparentid', 'arrchildid'], 'string', 'max' => 200],
            [['catname', 'catdir'], 'string', 'max' => 30],
            [['pic', 'parentdir', 'url'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '栏目ID',
            'type' => '类别',
            'modelid' => '模型ID',
            'parentid' => '父ID',
            'arrparentid' => '所有父类ID',
            'child' => '是否存在子栏目：0不存在，1存在',
            'arrchildid' => '所有子栏目ID',
            'catname' => '栏目名称',
            'pic' => '图片',
            'description' => '描述',
            'parentdir' => '父目录',
            'catdir' => '目录',
            'url' => '链接地址',
            'setting' => '配置信息',
            'sort' => '排序',
            'ismenu' => '是否显示',
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
            $model = Model::findOne($modelid);
            return $model['name'];
        }
    }

    /**
     * 获取分类列表
     * @return array
     */
    public function getList()
    {
        $num = self::find()->where('parentid=0')->asArray()->count();
        $data = self::find()->select('id,parentid,catname,type,modelid,sort,ismenu')->orderBy('sort asc')->asArray()->all();
        //echo '<pre>';
        //print_r($data);
        $arr = [];
        if($data){
            for($i=1;$i<=$num;$i++){
                $res_data = array_merge($arr,self::tree($data));
            }
        }
        //print_r($res_data);exit;
        return $res_data;
    }

    /**
     * 生成树形结构
     * @param $data
     * @param int $parent_id
     * @param int $level
     * @return array
     */
    private static function tree(&$data, $parent_id = 0, $level = 1)
    {
        //echo 'level:'.$level."<br>";
        if($data){
            foreach ($data as $key => $val){
                //echo $val['parentid'].'-'.$parent_id."<br>";
                if($val['parentid'] == $parent_id){
                    $val['catname'] = str_repeat('| -- ',$level-1).$val['catname'];
                    $val['level'] = $level;
                    self::$treeList[] = $val;
                    unset($data[$key]);
                    self::tree($data,$val['id'],$level+1);
                }
            }
        }

        //print_r(self::$treeList);exit;
        return self::$treeList;
    }

}
