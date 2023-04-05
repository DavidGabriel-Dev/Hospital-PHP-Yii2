<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procedimento".
 *
 * @property int $id
 * @property int $paciente_id
 * @property int $profissional_id
 * @property int|null $servico_id
 * @property string|null $data_procedimento
 * @property string|null $hora_procedimento
 *
 * @property Paciente $paciente
 * @property Profissional $profissional
 * @property Servico $servico
 */
class Procedimento extends \yii\db\ActiveRecord 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'procedimento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'profissional_id', 'servico_id'], 'required'],
            [['paciente_id', 'profissional_id', 'servico_id'], 'integer'],
            [['data_procedimento', 'hora_procedimento'], 'safe'],
            [['paciente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::class, 'targetAttribute' => ['paciente_id' => 'id']],
            [['profissional_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profissional::class, 'targetAttribute' => ['profissional_id' => 'id']],
            [['servico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Servico::class, 'targetAttribute' => ['servico_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paciente_id' => 'Paciente ID',
            'profissional_id' => 'Profissional ID',
            'servico_id' => 'Servico ID',
            'data_procedimento' => 'Data Procedimento',
            'hora_procedimento' => 'Hora Procedimento',
        ];
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Paciente::class, ['id' => 'paciente_id']);
    }

    /**
     * Gets query for [[Profissional]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfissional()
    {
        return $this->hasOne(Profissional::class, ['id' => 'profissional_id']);
    }

    /**
     * Gets query for [[Servico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServico()
    {
        return $this->hasOne(Servico::class, ['id' => 'servico_id']);
    }
}
