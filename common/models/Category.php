<?php

namespace common\models;

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
     * 获取栏目信息
     * @param null $id
     * @return array|null|\yii\db\ActiveRecord|\yii\db\ActiveRecord[]
     */
    public static function getData($id = null)
    {
        if(!empty($id)){
            return self::find()->where(['id'=>$id])->asArray()->one();
        }else{
            return self::find()->select('id,parentid,catname,description,pic,type,modelid,sort,ismenu')->orderBy('sort asc')->asArray()->all();
        }
    }

}
