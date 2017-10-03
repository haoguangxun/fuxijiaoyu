<?php

namespace backend\modules\content\models;

use Yii;

class Page extends \common\models\Page
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catid', 'updatetime'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string'],
            [['title', 'subtitle'], 'string', 'max' => 80],
            [['thumb', 'video'], 'string', 'max' => 100],
            [['keywords'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200],
            [['template'], 'string', 'max' => 30],
        ];
    }


}
