<?php

namespace app\models;
use app\models\Usuario;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $login
 * @property string $senha
 * @property string $nome
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'senha', 'nome'], 'required'],
            [['login', 'senha', 'nome'], 'string', 'max' => 255],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'senha' => 'Senha',
            'nome' => 'Nome',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new  yii\base\UnknownPropertyException();
    }
 
        /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
 
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
       // throw new  yii\base\UnknownPropertyException();
    }


    public function validateAuthKey($authKey)
    {
       // throw new  yii\base\UnknownPropertyException();
    }


    public static function findByUsername($username){
        return self::findOne(['login'=>$username]);
    } 
 
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->senha);
    }


}

