<?php

namespace backend\modules\content\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

/**
 * NewsSearch represents the model behind the search form about `common\models\News`.
 */
class NewsSearch extends News
{
    public function attributes()
    {
        return array_merge(parent::attributes(),['bgDate','edDate','keyword_type','keyword']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catid'], 'integer'],
            [['bgDate','edDate','keyword_type','keyword'], 'safe'],
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
        $query = News::find()->with('category');

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
            'catid' => $this->catid,
        ]);

        //ID、标题、作者
        if($this->keyword_type && $this->keyword){
            if($this->keyword_type == 'title'){
                $query->andWhere(['like', $this->keyword_type, $this->keyword]);
            }else{
                $query->andWhere([$this->keyword_type => $this->keyword,]);
            }
        }

        //日期
        $bgDate = $this->bgDate ? strtotime($this->bgDate) : '';
        $edDate = $this->edDate ? strtotime($this->edDate)+86400 : '';
        $query->andFilterWhere(['between', 'addtime', $bgDate , $edDate]);

        return $dataProvider;
    }
}
