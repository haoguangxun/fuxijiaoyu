<?php

namespace backend\modules\enroll\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\enroll\models\Enroll;

/**
 * EnrollSearch represents the model behind the search form about `backend\modules\enroll\models\Enroll`.
 */
class EnrollSearch extends Enroll
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'learn', 'learning_level', 'addtime', 'admin_id', 'status'], 'integer'],
            [['name', 'contact', 'expect_teacher', 'note'], 'safe'],
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
        $query = Enroll::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize'=>20],
            'sort'=>[
                'attributes'=>['id'],
                'defaultOrder'=>[
                    'id'=>SORT_DESC,
                ],
            ],
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
            'learn' => $this->learn,
            'learning_level' => $this->learning_level,
            'addtime' => $this->addtime,
            'admin_id' => $this->admin_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'expect_teacher', $this->expect_teacher])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
