<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Menus;

/**
 * MenusSearch represents the model behind the search form of `app\models\Menus`.
 */
class MenusSearch extends Menus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_id', 'fecha_id', 'receta_id'], 'integer'],
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
        $query = Menus::find();

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
            'menu_id' => $this->menu_id,
            'fecha_id' => $this->fecha_id,
            'receta_id' => $this->receta_id,
        ]);

        return $dataProvider;
    }
}
