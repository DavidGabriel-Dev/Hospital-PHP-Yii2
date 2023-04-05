<?php

use yii\db\Migration;

/**
 * Class m230402_164745_internacao
 */
class m230402_164745_internacao extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('internacao',[
            'id'=>$this->primaryKey(),
            'paciente_id'=>$this->integer(),
            'triagem_id'=>$this->integer(),
            'data_internacao'=>$this->date(),
            'hora_internacao'=>$this->time(),
            'ala'=>$this->integer()->notNull(),
            'quarto'=>$this->integer()->notNull()
        ]);
        $this->addForeignKey(
            'ch-paciente_id',
            'internacao',
            'paciente_id',
            'paciente',
            'id',
            'RESTRICT'
        );
        $this->addForeignKey(
            'ch-triagem_id',
            'internacao',
            'triagem_id',
            'triagem',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'ch-triagem_id',
            'internacao'
        );
        $this->dropForeignKey(
            'ch-paciente_id',
            'internacao'
        );
        $this->dropTable('internacao');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230402_164745_internacao cannot be reverted.\n";

        return false;
    }
    */
}
