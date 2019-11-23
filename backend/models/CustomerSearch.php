<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `app\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
	public $username;
	public $fullname;
	public $box_search;
	public $biz_type_name;
	
	
    public function rules()
    {
        return [
			[['username', 'fullname', 'biz_type_name'], 'string'],
            [['phone', 'username', 'fullname', 'biz_type_name'], 'safe'],
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
        $query = Customer::find();
		
		$query->joinWith(['user']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=> ['defaultOrder' => ['updated_at'=>SORT_DESC]],
			'pagination' => [
                'pageSize' => 100,
            ],

        ]);
		
		 $dataProvider->sort->attributes['username'] = [
        'asc' => ['user.username' => SORT_ASC],
        'desc' => ['user.username' => SORT_DESC],
		];
		
		


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

		$query->orFilterWhere(['like', 'user.username', $this->box_search]);
		$query->orFilterWhere(['like', 'user.fullname', $this->box_search]);


        return $dataProvider;
    }
}
