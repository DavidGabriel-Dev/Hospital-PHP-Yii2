<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servico".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 *
 * @property Gera[] $geras
 * @property Internacao[] $internacaos
 */
class Servico extends \yii\db\ActiveRecord 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao'], 'required'],
            [['nome', 'descricao'], 'string', 'max' => 255],
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
            'descricao' => 'Descrição',
        ];
    }

    /**
     * Gets query for [[Geras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGeras()
    {
        return $this->hasMany(Gera::class, ['servico_id' => 'id']);
    }


}
