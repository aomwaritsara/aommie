<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reservations;

/**
 * ReservationsSearch represents the model behind the search form about `app\models\Reservations`.
 */
class ReservationsSearch extends Reservations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Floor'], 'integer'],
            [['Room_Id', 'Name', 'Status'], 'safe'],
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
        $query = Reservations::find();

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
            'Floor' => $this->Floor,
        ]);

        $query->andFilterWhere(['like', 'Room_Id', $this->Room_Id])
            ->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
