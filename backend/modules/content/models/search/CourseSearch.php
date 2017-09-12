<?php

namespace backend\modules\content\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\content\models\Course;

/**
 * CourseSearch represents the model behind the search form about `backend\modules\content\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'catid', 'teacherid', 'difficulty_level', 'course_number', 'course_duration', 'posids', 'sort', 'status', 'islink', 'addtime', 'updatetime'], 'integer'],
            [['name', 'subtitle', 'thumb', 'keywords', 'description', 'url', 'author'], 'safe'],
            [['price'], 'number'],
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
        $query = Course::find();

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
            'catid' => $this->catid,
            'teacherid' => $this->teacherid,
            'price' => $this->price,
            'difficulty_level' => $this->difficulty_level,
            'course_number' => $this->course_number,
            'course_duration' => $this->course_duration,
            'posids' => $this->posids,
            'sort' => $this->sort,
            'status' => $this->status,
            'islink' => $this->islink,
            'addtime' => $this->addtime,
            'updatetime' => $this->updatetime,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'author', $this->author]);

        return $dataProvider;
    }
}
