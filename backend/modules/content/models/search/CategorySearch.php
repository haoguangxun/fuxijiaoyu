<?php

namespace backend\modules\content\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\content\models\Category;

/**
 * CategorySearch represents the model behind the search form about `backend\modules\category\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'modelid', 'parentid', 'child', 'sort', 'ismenu'], 'integer'],
            [['arrparentid', 'arrchildid', 'catname', 'pic', 'description', 'parentdir', 'catdir', 'url', 'setting'], 'safe'],
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
        $query = Category::find();

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
            'id' => $this->id,
            'modelid' => $this->modelid,
            'parentid' => $this->parentid,
            'child' => $this->child,
            'sort' => $this->sort,
            'ismenu' => $this->ismenu,
        ]);

        $query->andFilterWhere(['like', 'arrparentid', $this->arrparentid])
            ->andFilterWhere(['like', 'arrchildid', $this->arrchildid])
            ->andFilterWhere(['like', 'catname', $this->catname])
            ->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'parentdir', $this->parentdir])
            ->andFilterWhere(['like', 'catdir', $this->catdir])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'setting', $this->setting]);

        return $dataProvider;
    }
}
