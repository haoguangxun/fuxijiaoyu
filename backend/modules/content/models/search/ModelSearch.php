<?php

namespace backend\modules\content\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\content\models\Model;

/**
 * ModelSearch represents the model behind the search form about `backend\modules\content\models\Model`.
 */
class ModelSearch extends Model
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modelid', 'addtime', 'disabled', 'sort', 'type'], 'integer'],
            [['name', 'description', 'tablename', 'setting', 'category_template', 'list_template', 'show_template', 'js_template'], 'safe'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Model::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'modelid' => $this->modelid,
            'addtime' => $this->addtime,
            'disabled' => $this->disabled,
            'sort' => $this->sort,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'tablename', $this->tablename])
            ->andFilterWhere(['like', 'setting', $this->setting])
            ->andFilterWhere(['like', 'category_template', $this->category_template])
            ->andFilterWhere(['like', 'list_template', $this->list_template])
            ->andFilterWhere(['like', 'show_template', $this->show_template])
            ->andFilterWhere(['like', 'js_template', $this->js_template]);

        return $dataProvider;
    }
}
