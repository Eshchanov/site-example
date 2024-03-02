<?php

use yii\db\Migration;

/**
 * Class m210904_112838_general
 */
class m210904_112838_general extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("general", [
            'id' => $this->primaryKey(),
            'telegram' => $this->string(255)->notNull(),
            'instagram' => $this->string(255)->notNull(),
            'facebook' => $this->string(255)->notNull(),
            'youtube' => $this->string(255)->notNull(),
            'call_centre' => $this->string(255)->notNull(),
            'tel' => $this->string(255)->notNull(),
            'video' => $this->string(255)->notNull(),
            'appstore' => $this->string(255)->notNull(),
            'google_play' => $this->string(255)->notNull(),
            'bot_name' => $this->string(255)->notNull(),
            'bot_link' => $this->string(255)->notNull(),
            'mail' => $this->string(255)->notNull(),
            'address' => $this->string(255)->notNull(),
            'hours' => $this->string(255)->notNull(),
            'about_main' => $this->text()->notNull(),
            'aim_main' => $this->text()->notNull(),
            'about_about' => $this->text()->notNull(),
            'aim_about' => $this->text()->notNull(),
            'tonn' => $this->integer()->notNull(),
            'partners' => $this->integer()->notNull(),
            'workers' => $this->integer()->notNull(),
            'video_about' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_112838_general cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_112838_general cannot be reverted.\n";

        return false;
    }
    */
}
