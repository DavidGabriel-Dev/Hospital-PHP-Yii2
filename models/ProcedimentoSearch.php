<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Procedimento;

/**
 * ProcedimentoSearch represents the model behind the search form of `app\models\Procedimento`.
 */
class ProcedimentoSearch extends Procedimento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'profissional_id', 'servico_id'], 'integer'],
            [['data_procedimento', 'hora_procedimento'], 'safe'],
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
        $query = Procedimento::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->joinWith(['paciente']);
        $dataProvider->sort->attributes['paciente.nome'] = [
            'asc' => ['paciente.nome' => SORT_ASC],
            'desc' => ['paciente.nome' => SORT_DESC],
        ];
        $query->joinWith(['profissional']);
        $dataProvider->sort->attributes['profissional.nome'] = [
            'asc' => ['profissional.nome' => SORT_ASC],
            'desc' => ['profissional.nome' => SORT_DESC],
        ];
        $query->joinWith(['servico']);
        $dataProvider->sort->attributes['servico.nome'] = [
            'asc' => ['servico.nome' => SORT_ASC],
            'desc' => ['servico.nome' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'paciente_id' => $this->paciente_id,
            'profissional_id' => $this->profissional_id,
            'servico_id' => $this->servico_id,
            'data_procedimento' => $this->data_procedimento,
            'hora_procedimento' => $this->hora_procedimento,
        ]);

        return $dataProvider;
    }
}
