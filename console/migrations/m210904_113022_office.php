<?php

use yii\db\Migration;

/**
 * Class m210904_113022_office
 */
class m210904_113022_office extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("office", [
            'id' => $this->primaryKey(),
            'photo' =>$this->string(255)->notNull(),
            'address' =>$this->string(255)->notNull(),
            'address_link' =>$this->string(255)->notNull(),
            'destination' =>$this->string(255)->notNull(),
            'tel' =>$this->string(25)->notNull(),
            'region' =>$this->string(25)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113022_office cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_113022_office cannot be reverted.\n";

        return false;
    }
    */
}
