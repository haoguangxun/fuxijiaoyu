<?php

namespace backend\modules\content\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Teacher;

/**
 * TeacherSearch represents the model behind the search form about `common\models\Teacher`.
 */
class TeacherSearch extends Teacher
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'catid'], 'integer'],
            [['name'], 'safe'],
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
        $query = Teacher::find()->with('category');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize'=>20],
            'sort'=>[
                'attributes'=>['sort','id'],
                'defaultOrder'=>[
                    'sort'=>SORT_DESC,
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
            'catid' => $this->catid,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
