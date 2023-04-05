<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $rg
 * @property string|null $telefone
 * @property string|null $endereco
 * @property string $sus_card
 * @property string|null $pai
 * @property string|null $mae
 * @property int|null $idade
 * @property string|null $data_nasc
 *
 * @property Triagem[] $triagems
 */
class paciente extends \yii\db\ActiveRecord 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paciente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['cpf'], 'required'],
            [['rg'], 'required'],
            [['sus_card'], 'required'],
            [['endereco'], 'string'],
            [['idade'], 'integer'],
            [['data_nasc'], 'safe'],
            [['nome', 'pai', 'mae'], 'string', 'max' => 150],
            [['cpf'], 'string', 'max' => 30],
            [['rg'], 'string', 'max' => 30],
            [['telefone'], 'string', 'max' => 20],
            [['sus_card'], 'string', 'max' => 19],



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
            'cpf' => 'Cpf',
            'rg' => 'Rg',
            'telefone' => 'Telefone',
            'endereco' => 'Endereco',
            'sus_card' => 'Cartão do SUS',
            'pai' => 'Pai',
            'mae' => 'Mae',
            'idade' => 'Idade',
            'data_nasc' => 'Data de Nascimento',
        ];
    }

    
}
