<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Internacao;

/**
 * InternacaoSearch represents the model behind the search form of `app\models\Internacao`.
 */
class InternacaoSearch extends Internacao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'paciente_id', 'triagem_id', 'ala', 'quarto'], 'integer'],
            [['data_internacao', 'hora_internacao'], 'safe'],
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
        $query = Internacao::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->joinWith(['paciente']);
        $dataProvider->sort->attributes['paciente.nome'] = [
            'asc' => ['paciente.nome' => SORT_ASC],
            'desc' => ['paciente.nome' => SORT_DESC],
        ];

        $query->joinWith(['triagem']);
        $dataProvider->sort->attributes['triagem.id'] = [
            'asc' => ['triagem.id' => SORT_ASC],
            'desc' => ['triagem.id' => SORT_DESC],
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
            'triagem_id' => $this->triagem_id,
            'data_internacao' => $this->data_internacao,
            'hora_internacao' => $this->hora_internacao,
            'ala' => $this->ala,
            'quarto' => $this->quarto,
        ]);

        return $dataProvider;
    }
}
