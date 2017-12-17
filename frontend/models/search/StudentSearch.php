<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Course;

/**
 * StudentSearch represents the model behind the search form about `frontend\models\Order`.
 */
class StudentSearch extends Course
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'catid', 'teacherid', 'difficulty_level', 'status', 'addtime'], 'integer'],
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
        $query = Course::find()->alias('c')
            ->select('c.id,c.name,o.addtime,o.userid')
            ->leftJoin('fx_order as o', 'c.id=o.courseid')
            ->where('o.status=1');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'attributes'=>['o.id'],
                'defaultOrder'=>[
                    'o.id'=>SORT_DESC,
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
            'c.teacherid' => Yii::$app->user->identity->id,
            'c.catid' => $this->catid,
            'c.price' => $this->price,
            'c.difficulty_level' => $this->difficulty_level,
            'c.status' => $this->status,
            'c.addtime' => $this->addtime,
        ]);

        $query->andFilterWhere(['like', 'c.name', $this->name]);

        return $dataProvider;
    }
}
