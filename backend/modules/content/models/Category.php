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
    public function getModelType()
    {
        if($this->type == 1){
            return '单网页';
        }else{
            $model = Model::findOne($this->modelid);
            return $model['name'];
        }
    }

}
