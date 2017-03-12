<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bill;

/**
 * BillSearch represents the model behind the search form about `app\models\Bill`.
 */
class BillSearch extends Bill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Elec_Used', 'Water_Used', 'Cost', 'TotalAmount'], 'integer'],
            [['Room_Id', 'Cus_Id', 'DateFrom', 'SoR_Id', 'CurrentDate', 'Unit', 'PaymentStatus'], 'safe'],
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
        $query = Bill::find();

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
            'DateFrom' => $this->DateFrom,
            'CurrentDate' => $this->CurrentDate,
            'Elec_Used' => $this->Elec_Used,
            'Water_Used' => $this->Water_Used,
            'Cost' => $this->Cost,
            'TotalAmount' => $this->TotalAmount,
        ]);

        $query->andFilterWhere(['like', 'Room_Id', $this->Room_Id])
            ->andFilterWhere(['like', 'Cus_Id', $this->Cus_Id])
            ->andFilterWhere(['like', 'SoR_Id', $this->SoR_Id])
            ->andFilterWhere(['like', 'Unit', $this->Unit])
            ->andFilterWhere(['like', 'PaymentStatus', $this->PaymentStatus]);

        return $dataProvider;
    }
}
