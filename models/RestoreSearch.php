<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Restore;

/**
 * RestoreSearch represents the model behind the search form of `app\models\Restore`.
 */
class RestoreSearch extends Restore
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'NumCus', 'Deposit'], 'integer'],
            [['Room_Id', 'Cus_Id', 'StartDate', 'DateFrom', 'DateTo', 'Status'], 'safe'],
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
        $query = Restore::find();

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
            'StartDate' => $this->StartDate,
            'DateFrom' => $this->DateFrom,
            'DateTo' => $this->DateTo,
            'NumCus' => $this->NumCus,
            'Deposit' => $this->Deposit,
        ]);

        $query->andFilterWhere(['like', 'Room_Id', $this->Room_Id])
            ->andFilterWhere(['like', 'Cus_Id', $this->Cus_Id])
            ->andFilterWhere(['like', 'Status', $this->Status='2']);
             $query->orderBy(['Room_Id' => SORT_ASC]);
         //$query->orderBy(['Status' => SORT_DESC, 'DateTo' => SORT_DESC]);

        return $dataProvider;
    }
}
