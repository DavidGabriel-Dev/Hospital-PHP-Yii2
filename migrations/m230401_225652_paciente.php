<?php

use yii\db\Migration;

/**
 * Class m230401_225652_paciente
 */
class m230401_225652_paciente extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('paciente',[
            'id'=>$this->primaryKey(),
            'nome'=>$this->string()->notNull(),
            'cpf'=>$this->string()->notNull(),
            'rg'=>$this->string()->notNull(),
            'telefone'=>$this->string(),
            'endereco'=>$this->text(),
            'sus_card'=>$this->string()->notNull(),
            'pai'=>$this->string(),
            'mae'=>$this->string(),
            'idade'=>$this->integer(),
            'data_nasc'=>$this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('paciente');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230401_225652_paciente cannot be reverted.\n";

        return false;
    }
    */
}
