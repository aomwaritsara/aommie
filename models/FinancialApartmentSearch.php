<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FinancialApartment;

/**
 * FinancialApartmentSearch represents the model behind the search form about `app\models\FinancialApartment`.
 */
class FinancialApartmentSearch extends FinancialApartment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Amount', 'Price'], 'integer'],
            [['Date', 'Destination', 'Name','Finan_Id' ], 'safe'],
            [['TotalPrice'], 'number'],
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
        $query = FinancialApartment::find();

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
           
            'Apart_Id' => $this->Apart_Id,
            'Date' => $this->Date,
            'Amount' => $this->Amount,
            'Price' => $this->Price,
            'TotalPrice' => $this->TotalPrice,
        ]);

        $query->andFilterWhere(['like', 'Finan_Id', $this->Finan_Id])
        ->andFilterWhere(['like', 'Destination', $this->Destination])
            ->andFilterWhere(['like', 'Name', $this->Name]);

        return $dataProvider;
    }
}
