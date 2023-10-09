<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Solicitudesplazamercado;

/**
 * SolicitudesplazamercadoSearch represents the model behind the search form of `app\models\Solicitudesplazamercado`.
 */
class SolicitudesplazamercadoSearch extends Solicitudesplazamercado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['solicitud_id'], 'integer'],
            [['fecha', 'nombre_ingrediente', 'cantidad'], 'safe'],
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
        $query = Solicitudesplazamercado::find();

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
            'solicitud_id' => $this->solicitud_id,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'nombre_ingrediente', $this->nombre_ingrediente])
            ->andFilterWhere(['like', 'cantidad', $this->cantidad]);

        return $dataProvider;
    }
}
