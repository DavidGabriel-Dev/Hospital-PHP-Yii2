<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "internacao".
 *
 * @property int $id
 * @property int|null $paciente_id
 * @property int|null $triagem_id
 * @property string|null $data_internacao
 * @property string|null $hora_internacao
 * @property int $ala
 * @property int $quarto
 *
 * @property Paciente $paciente
 * @property Triagem $triagem
 */
class Internacao extends \yii\db\ActiveRecord 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'internacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'triagem_id', 'ala', 'quarto'], 'integer'],
            [['data_internacao', 'hora_internacao'], 'safe'],
            [['ala', 'quarto'], 'required'],
            [['paciente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::class, 'targetAttribute' => ['paciente_id' => 'id']],
            [['triagem_id'], 'exist', 'skipOnError' => true, 'targetClass' => Triagem::class, 'targetAttribute' => ['triagem_id' => 'id']],
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
            'triagem_id' => 'Triagem ID',
            'data_internacao' => 'Data Internacao',
            'hora_internacao' => 'Hora Internacao',
            'ala' => 'Ala',
            'quarto' => 'Quarto',
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
     * Gets query for [[Triagem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTriagem()
    {
        return $this->hasOne(Triagem::class, ['id' => 'triagem_id']);
    }
}
