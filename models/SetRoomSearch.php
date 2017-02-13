<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SetRoom;

/**
 * SetRoomSearch represents the model behind the search form about `app\models\SetRoom`.
 */
class SetRoomSearch extends SetRoom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Apart_Id', 'Price', 'Eletricity', 'Watersupply'], 'integer'],
            [['Room_Id', 'Type'], 'safe'],
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
        $query = SetRoom::find();

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
            'Price' => $this->Price,
            'Eletricity' => $this->Eletricity,
            'Watersupply' => $this->Watersupply,
        ]);

        $query->andFilterWhere(['like', 'Room_Id', $this->Room_Id])
            ->andFilterWhere(['like', 'Type', $this->Type]);

        return $dataProvider;
    }
}
