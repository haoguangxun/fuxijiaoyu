<?php

namespace backend\modules\content\models;

use Yii;

class Models extends \common\models\Models
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'tablename', 'sort'], 'required'],
            [['setting'], 'string'],
            [['addtime', 'disabled', 'sort'], 'integer'],
            [['name', 'category_template', 'list_template', 'show_template', 'js_template'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 100],
            [['tablename'], 'string', 'max' => 20],
            [['sort'], 'default', 'value' => 0],
        ];
    }
}
