<?php

use yii\db\Migration;

/**
 * Class m210904_113356_news
 */
class m210904_113356_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("news", [
            'id' => $this->primaryKey(),
            'photo' =>$this->string(255)->notNull(),
            'title' =>$this->string(255)->notNull(),
            'date' =>$this->integer()->notNull(),
            'info' =>$this->string(255)->notNull(),
            'info_full' =>$this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113356_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_113356_news cannot be reverted.\n";

        return false;
    }
    */
}
