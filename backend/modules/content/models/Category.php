<?php

namespace backend\modules\content\models;

use common\helper\Tree;
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

    /**
     * 获取树型分类列表
     * @return array
     */
    public static function getTreeList()
    {
        $num = self::find()->where('parentid=0')->asArray()->count();
        $data = self::getData();
        //echo '<pre>';
        //print_r($data);
        $arr = [];
        if($data){
            for($i=1;$i<=$num;$i++){
                $res_data = array_merge($arr,Tree::getTree($data));
            }

            /*$tree = new Tree();
            $tree->tree($data);
            $str = "<tr>
						<td style='text-align:center'><input name='listorder[\$id]' type='text' size='3' value='\$sort'></td>
						<td style='text-align:center'>\$id</td>
						<td style='text-align:left'>\$spacer<a href='?mod=\$modelid&action=edit&catid=\$id&parentid=\$parentid'>\$catname</a></td>
					</tr>";
            $res_data = $tree->get_tree(0,$str);*/
        }
        //print_r($res_data);exit;
        return $res_data;
    }

    /**
     * 获取下拉菜单树型分类列表
     * @return array
     */
    public static function getSelectList()
    {
        $num = self::find()->where('parentid=0')->asArray()->count();
        $data = self::getData();
        $arr = [];
        if($data){
            for($i=1;$i<=$num;$i++){
                $res_data = array_merge($arr,Tree::getTree($data));
            }
            $list = [
                0 => '顶级栏目',
            ];
            foreach ($res_data as $key => $val) {
                $list[$val['id']] = $val['catname'];
            }

        }
        return $list;
    }

    /**
     * 根据子类id查找出所有父级分类信息
     * @param $id
     * @return array
     */
    public static function getParentList($id = 0){
        $data = self::getData();
        $tree = new Tree();
        $list = $tree->getParents($data,$id);
        return $list;
    }

    /**
     * 根据父id获得所有下级子类id的数据
     * @param $id
     * @return array
     */
    public static function getSonList($id = 0){
        $data = self::getData();
        $tree = new Tree();
        $list = $tree->getSons($data,$id);
        return $list;
    }

    /**
     * 根据父id获得指定模型的下级子类的数据
     * @param $id
     * @param $mid
     * @return array
     */
    public static function getModelSonList($id = 0, $mid = 0){
        $data = self::getData();
        $tree = new Tree();
        $list = $tree->getSons($data,$id);
        foreach ($list as $key => $val) {
            if($val['modelid'] != $mid){
                unset($list[$key]);
            }
        }
        return $list;
    }

    /**
     * 获取所属子分类ID并保存
     */
    public function updateSonCategory($id)
    {
        $son = self::getSonList($id);
        $res = self::findOne($id);
        if($son){
            foreach ($son as $key => $val) {
                $sids[$val['id']] = $val['id'];
            }
            $res->child = 1;
            $res->arrchildid = implode(',',$sids);
        }else{
            $res->child = 0;
            $res->arrchildid = '';
        }
        $res->save();
    }

}
