<?php

use yii\db\Migration;

/**
 * Class m211011_100404_services
 */
class m211011_100404_services extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("services", [
            'id' => $this->primaryKey(),
            'name' =>$this->string(255)->notNull(),
            'image' =>$this->string(255)->notNull(),
            'text' =>$this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211011_100404_services cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211011_100404_services cannot be reverted.\n";

        return false;
    }
    */
}
