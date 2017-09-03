<?php

namespace backend\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\admin\models\AdminRole;

/**
 * RoleSearch represents the model behind the search form about `backend\modules\admin\models\AdminRole`.
 */
class RoleSearch extends AdminRole
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            //[['name'], 'safe'],
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
        //不显示root组
        $where = [];
        if(Yii::$app->user->identity->roleid !=1) {     
            $where = ['<>','id',1];
        }
        
        $query = AdminRole::find()->where($where)->with('user');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => ['id'=>SORT_DESC],
                'attributes' => ['id','updated_at'],
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
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
    
        
}
