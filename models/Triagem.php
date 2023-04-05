<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "triagem".
 *
 * @property int $id
 * @property int|null $paciente_id
 * @property string|null $data_triagem
 * @property string|null $hora_triagem
 * @property string $sintomas
 * @property string $saturacao
 * @property string $pressao
 * @property string $gravidade
 *
 * @property Paciente $paciente
 */
class Triagem extends \yii\db\ActiveRecord 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'triagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id'], 'integer'],
            [['data_triagem', 'hora_triagem'], 'safe'],
            [['sintomas', 'saturacao', 'pressao', 'gravidade'], 'required'],
            [['sintomas', 'saturacao', 'pressao', 'gravidade'], 'string', 'max' => 255],
            [['paciente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::class, 'targetAttribute' => ['paciente_id' => 'id']],
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
            'data_triagem' => 'Data Triagem',
            'hora_triagem' => 'Hora Triagem',
            'sintomas' => 'Sintomas',
            'saturacao' => 'Saturacao',
            'pressao' => 'Pressao',
            'gravidade' => 'Gravidade',
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
}
