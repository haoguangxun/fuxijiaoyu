<?php

namespace common\models;

use Yii;
use common\helper\Tree;
use common\models\Models;

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
            'keywords' => '关键字',
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
            $model = Models::findOne($modelid);
            return $model['name'];
        }
    }

    public static function getData($id = null)
    {
        if(!empty($id)){
            return self::find()->where(['id'=>$id])->asArray()->one();
        }else{
            return self::find()->select('id,parentid,catname,description,pic,type,modelid,sort,ismenu')->orderBy('sort asc')->asArray()->all();
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
     * @param $arr
     * @param $id
     * @return array
     */
    public static function getParentList($id = 0){
        $data = self::getData();
        $parentList = Tree::getParent($data,$id);
        return $parentList;
    }

    /**
     * 根据父id获得所有下级子类id的数据
     * @param $arr
     * @param $id
     * @return array
     */
    public static function getSonList($id = 0){
        $data = self::getData();
        $sonList = Tree::getSon($data,$id);
        return $sonList;
    }

}
