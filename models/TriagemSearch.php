<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Triagem;

/**
 * TriagemSearch represents the model behind the search form of `app\models\Triagem`.
 */
class TriagemSearch extends Triagem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'paciente_id'], 'integer'],
            [['data_triagem', 'hora_triagem', 'sintomas', 'saturacao', 'pressao', 'gravidade'], 'safe'],
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
        $query = Triagem::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->joinWith(['paciente']);
        $dataProvider->sort->attributes['paciente.nome'] = [
            'asc' => ['paciente.nome' => SORT_ASC],
            'desc' => ['paciente.nome' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'paciente_id' => $this->paciente_id,
            'data_triagem' => $this->data_triagem,
            'hora_triagem' => $this->hora_triagem,
        ]);

        $query->andFilterWhere(['like', 'sintomas', $this->sintomas])
            ->andFilterWhere(['like', 'saturacao', $this->saturacao])
            ->andFilterWhere(['like', 'pressao', $this->pressao])
            ->andFilterWhere(['like', 'gravidade', $this->gravidade]);

        return $dataProvider;
    }
}
