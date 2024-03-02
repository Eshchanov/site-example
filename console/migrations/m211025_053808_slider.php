<?php

use yii\db\Migration;

/**
 * Class m211025_053808_slider
 */
class m211025_053808_slider extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("slider", [
            'id' => $this->primaryKey(),
            'image' =>$this->string(255)->notNull(),
            'lang' =>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211025_053808_slider cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211025_053808_slider cannot be reverted.\n";

        return false;
    }
    */
}
