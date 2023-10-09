<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fechas;

/**
 * FechasSearch represents the model behind the search form of `app\models\Fechas`.
 */
class FechasSearch extends Fechas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_id'], 'integer'],
            [['dias', 'semanas'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Fechas::find();

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
            'fecha_id' => $this->fecha_id,
        ]);

        $query->andFilterWhere(['like', 'dias', $this->dias])
            ->andFilterWhere(['like', 'semanas', $this->semanas]);

        return $dataProvider;
    }
}
