<?php

use yii\db\Migration;

/**
 * Class m230402_160215_triagem
 */
class m230402_160215_triagem extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('triagem',[
            'id'=>$this->primaryKey(),
            'paciente_id'=>$this->integer(),
            'data_triagem'=>$this->date(),
            'hora_triagem'=>$this->time(),
            'sintomas'=>$this->string()->notNull(),
            'saturacao'=>$this->string()->notNull(),
            'pressao'=>$this->string()->notNull(),
            'gravidade'=>$this->string()->notNull()
        ]);
        $this->addForeignKey(
            'fk-paciente_id',
            'triagem',
            'paciente_id',
            'paciente',
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
            'fk-paciente_id',
            'triagem'
        );
        $this->dropTable('triagem');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230402_160215_triagem cannot be reverted.\n";

        return false;
    }
    */
}
