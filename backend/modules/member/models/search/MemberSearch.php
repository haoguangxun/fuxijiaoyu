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
            [['userid', 'phone', 'type', 'point', 'regtime', 'lasttime', 'regip', 'lastip', 'loginnum', 'islock', 'vip', 'overduedate'], 'integer'],
            [['username', 'auth_key', 'password', 'password_reset_token', 'email_validate_token', 'nickname', 'photo', 'email'], 'safe'],
            [['amount'], 'number'],
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
            'type' => $this->type,
            'amount' => $this->amount,
            'point' => $this->point,
            'regtime' => $this->regtime,
            'lasttime' => $this->lasttime,
            'regip' => $this->regip,
            'lastip' => $this->lastip,
            'loginnum' => $this->loginnum,
            'islock' => $this->islock,
            'vip' => $this->vip,
            'overduedate' => $this->overduedate,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email_validate_token', $this->email_validate_token])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
