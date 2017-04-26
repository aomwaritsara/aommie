<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bill;

/**
 * BillSearch represents the model behind the search form of `app\models\Bill`.
 */
class BillSearch extends Bill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Elec_Used', 'Water_Used', 'Cost', 'TotalPrice'], 'integer'],
            [['Room_Id', 'Cus_Id', 'DateFrom', 'SoR_Id', 'CheckDate', 'PaymentStatus'], 'safe'],
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
            'CheckDate' => $this->CheckDate,
            'Elec_Used' => $this->Elec_Used,
            'Water_Used' => $this->Water_Used,
            'Cost' => $this->Cost,
            'TotalPrice' => $this->TotalPrice,
        ]);

        $query->andFilterWhere(['like', 'Room_Id', $this->Room_Id])
            ->andFilterWhere(['like', 'Cus_Id', $this->Cus_Id])
            ->andFilterWhere(['like', 'SoR_Id', $this->SoR_Id])
            ->andFilterWhere(['like', 'PaymentStatus', $this->PaymentStatus = '0']);
             $query->orderBy(['PaymentStatus' => SORT_ASC, ]);
              $query->orderBy(['Room_Id' => SORT_ASC, ]);
                $query->orderBy(['DateFrom' => SORT_DESC, ]);

        return $dataProvider;
    }
}
