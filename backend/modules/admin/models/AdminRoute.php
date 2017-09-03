<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%admin_route}}".
 *
 * @property string $id
 * @property string $route
 */
class AdminRoute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_route}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route' => 'Route',
        ];
    }
}
