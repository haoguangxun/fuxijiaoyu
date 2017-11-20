<?php

namespace backend\modules\member\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\member\models\Member;

/**
 * MemberSearch represents the model behind the search form about `backend\modules\member\models\Member`.
 */
class MemberSearch extends Member
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'sex', 'phone', 'type', 'regtime', 'lasttime', 'loginnum', 'islock', 'vip'], 'integer'],
            [['username', 'nickname', 'realname', 'email'], 'safe'],
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
        $query = Member::find();

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
            'userid' => $this->userid,
            'phone' => $this->phone,
            'sex' => $this->sex,
            'type' => $this->type,
            'regtime' => $this->regtime,
            'lasttime' => $this->lasttime,
            'loginnum' => $this->loginnum,
            'islock' => $this->islock,
            'vip' => $this->vip,
            'overduedate' => $this->overduedate,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'realname', $this->realname])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
