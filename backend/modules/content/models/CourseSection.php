<?php

namespace backend\modules\content\models;

use Yii;

class CourseSection extends \common\models\CourseSection
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'courseid', 'audition'], 'integer'],
            [['name','video'], 'required'],
            [['name', 'subtitle'], 'string', 'max' => 80],
            [['video', 'url'], 'string', 'max' => 100],
            [['template'], 'string', 'max' => 30],
            [['sort'], 'default', 'value' => 0],
        ];
    }
}
