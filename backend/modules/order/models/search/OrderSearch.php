<?php

namespace backend\modules\order\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\order\models\Order;

/**
 * OrderSearch represents the model behind the search form about `backend\modules\order\models\Order`.
 */
class OrderSearch extends Order
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
            [['courseid', 'userid', 'addtime', 'pay_type', 'status'], 'integer'],
            [['orderid','bgDate','edDate'], 'safe'],
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
        $query = Order::find();

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
            'courseid' => $this->courseid,
            'userid' => $this->userid,
            'addtime' => $this->addtime,
            'pay_type' => $this->pay_type,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'orderid', $this->orderid]);

        //日期
        $bgDate = $this->bgDate ? strtotime($this->bgDate) : '';
        $edDate = $this->edDate ? strtotime($this->edDate)+86400 : '';
        $query->andFilterWhere(['between', 'addtime', $bgDate , $edDate]);

        return $dataProvider;
    }
}
