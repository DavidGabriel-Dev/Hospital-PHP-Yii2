<?php

use yii\db\Migration;

/**
 * Class m230401_225135_profissional
 */
class m230401_225135_profissional extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(){
        $this-> createTable('profissional', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'idade' => $this->integer(),
            'cargo' => $this->string()->notNull(),
            'registro'=> $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(){
        $this->dropTable('profissional');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230401_225135_profissional cannot be reverted.\n";

        return false;
    }
    */
}
