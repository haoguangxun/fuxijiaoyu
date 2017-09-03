<?php

namespace backend\modules\admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\admin\models\User as UserModel;

/**
 * User represents the model behind the search form about `backend\modules\admin\models\User`.
 */
class User extends UserModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'updated_at','role_name'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email'], 'safe'],
            ['created_at','string']
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
        //不显示root用户 id 1
        $where = [];
        if(Yii::$app->user->identity->roleid !=1) {
            $where = ['<>','roleid',1];
        }
        $query = UserModel::find()->where($where);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [ 
                'defaultOrder' => ['id'=>SORT_DESC],
                'attributes' => ['id','created_at'],
            ],
        ]);
        
            
        $this->load($params);
        if (!$this->validate()) {
            $query->where('1=0');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'roleid' => $this->role_name,
        ]);
        
        $b = $this->created_at ? strtotime($this->created_at)-604800 : '';
        $e = $this->created_at ? strtotime($this->created_at)+604800 : '';
        
        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['between', 'created_at', $b , $e]);

        return $dataProvider;
    }
}
