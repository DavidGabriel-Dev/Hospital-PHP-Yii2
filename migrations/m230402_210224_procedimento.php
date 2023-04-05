<?php

use yii\db\Migration;

/**
 * Class m230402_210224_procedimento
 */
class m230402_210224_procedimento extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        $this->createTable('procedimento',[
            'id'=>$this->primaryKey(),
            'paciente_id'=>$this->integer(),
            'profissional_id'=>$this->integer(),
            'servico_id'=>$this->integer(),
            'data_procedimento'=>$this->date(),
            'hora_procedimento'=>$this->time()
        ]);
        $this->addForeignKey('chave-paciente_id', 'procedimento', 'paciente_id', 'paciente', 'id', 'RESTRICT');
        $this->addForeignKey('chave-profissional_id', 'procedimento', 'profissional_id', 'profissional', 'id', 'RESTRICT');
        $this->addForeignKey('chave-servico_id', 'procedimento', 'servico_id', 'servico', 'id', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'chave-servico_id',
            'procedimento'
        );
        $this->dropForeignKey(
            'chave-profissional_id',
            'procedimento'
        );
        $this->dropForeignKey(
            'chave-paciente_id',
            'procedimento'
        );
        $this->dropTable('procedimento');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230402_210224_procedimento cannot be reverted.\n";

        return false;
    }
    */
}
