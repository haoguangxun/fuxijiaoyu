<?php

namespace backend\modules\admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\admin\models\AdminMenu as AdminMenuModel;

/**
 * Menu represents the model behind the search form about [[\backend\modules\admin\models\Menu]].
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class AdminMenu extends AdminMenuModel
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parentid', 'order'], 'integer'],
            [['name', 'route', 'parent_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Searching menu
     * @param  array $params
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params)
    {
        $query = AdminMenuModel::find()
            ->from(AdminMenuModel::tableName() . ' t')
            ->joinWith(['menuParent' => function ($q) {
            $q->from(AdminMenuModel::tableName() . ' parentid');
        }]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $sort = $dataProvider->getSort();
        $sort->attributes['menuParent.name'] = [
            'asc' => ['parentid.name' => SORT_ASC],
            'desc' => ['parentid.name' => SORT_DESC],
            'label' => 'parentid',
        ];
        $sort->attributes['order'] = [
            'asc' => ['parentid.order' => SORT_ASC, 't.order' => SORT_ASC],
            'desc' => ['parentid.order' => SORT_DESC, 't.order' => SORT_DESC],
            'label' => 'order',
        ];
        $sort->defaultOrder = ['menuParent.name' => SORT_ASC];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            't.id' => $this->id,
            't.parentid' => $this->parentid,
        ]);

        $query->andFilterWhere(['like', 'lower(t.name)', strtolower($this->name)])
            ->andFilterWhere(['like', 't.route', $this->route])
            ->andFilterWhere(['like', 'lower(parentid.name)', strtolower($this->parent_name)]);

        return $dataProvider;
    }
}
