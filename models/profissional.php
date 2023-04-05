<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profissional".
 *
 * @property int $id
 * @property string $nome
 * @property int|null $idade
 * @property string $cargo
 * @property string $registro
 *
 * @property Gera[] $geras
 */
class profissional extends \yii\db\ActiveRecord 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profissional';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cargo', 'registro'], 'required'],
            [['idade'], 'integer'],
            [['nome'], 'string', 'max' => 150],
            [['cargo'], 'string', 'max' => 100],
            [['registro'], 'string', 'max' => 40],


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'idade' => 'Idade',
            'cargo' => 'Cargo',
            'registro' => 'Registro',
        ];
    }

    /**
     * Gets query for [[Geras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGeras()
    {
        return $this->hasMany(Gera::class, ['profissional_id' => 'id']);
    }
}
