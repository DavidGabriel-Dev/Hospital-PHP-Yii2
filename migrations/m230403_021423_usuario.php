<?php

use yii\db\Migration;

/**
 * Class m230403_021423_usuario
 */
class m230403_021423_usuario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usuario',[
            'id'=>$this->primaryKey(),
            'login'=>$this->string()->notNull()->unique(),
            'senha'=>$this->string()->notNull(),
            'nome'=>$this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('usuario');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230403_021423_usuario cannot be reverted.\n";

        return false;
    }
    */
}
