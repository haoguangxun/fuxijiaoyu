<?php

namespace backend\modules\content\models;

use Yii;

/**
 * This is the model class for table "{{%models}}".
 *
 * @property integer $modelid
 * @property string $name
 * @property string $description
 * @property string $tablename
 * @property string $setting
 * @property string $addtime
 * @property integer $disabled
 * @property string $category_template
 * @property string $list_template
 * @property string $show_template
 * @property string $js_template
 * @property integer $sort
 */
class Models extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%models}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['setting'], 'string'],
            [['addtime', 'disabled', 'sort'], 'integer'],
            [['name', 'category_template', 'list_template', 'show_template', 'js_template'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 100],
            [['tablename'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'modelid' => '模型ID',
            'name' => '模型名称',
            'description' => '描述',
            'tablename' => '表名',
            'setting' => '配置信息',
            'addtime' => '添加时间',
            'disabled' => '是否禁用：0启用，1禁用',
            'category_template' => '栏目模板',
            'list_template' => '列表页模板',
            'show_template' => '内容页模板',
            'js_template' => 'JS模板',
            'sort' => '排序',
        ];
    }
}
