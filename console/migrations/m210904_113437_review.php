<?php

use yii\db\Migration;

/**
 * Class m210904_113437_review
 */
class m210904_113437_review extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("review", [
            'id' => $this->primaryKey(),
            'video' =>$this->string(255)->notNull(),
            'name' =>$this->string(255)->notNull(),
            'position' =>$this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113437_review cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_113437_review cannot be reverted.\n";

        return false;
    }
    */
}
