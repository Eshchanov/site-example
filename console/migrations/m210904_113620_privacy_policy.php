<?php

use yii\db\Migration;

/**
 * Class m210904_113620_privacy_policy
 */
class m210904_113620_privacy_policy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("privancy_policy", [
            'id' => $this->primaryKey(),
            'text' =>$this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113620_privacy_policy cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_113620_privacy_policy cannot be reverted.\n";

        return false;
    }
    */
}
