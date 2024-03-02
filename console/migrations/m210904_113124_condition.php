<?php

use yii\db\Migration;

/**
 * Class m210904_113124_condition
 */
class m210904_113124_condition extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("condition", [
            'id' => $this->primaryKey(),
            'name' =>$this->string(255)->notNull(),
            'condition' =>$this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113124_condition cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_113124_condition cannot be reverted.\n";

        return false;
    }
    */
}
