<?php

use yii\db\Migration;

/**
 * Class m210904_113456_partners
 */
class m210904_113456_partners extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("partner", [
            'id' => $this->primaryKey(),
            'photo' =>$this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113456_partners cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_113456_partners cannot be reverted.\n";

        return false;
    }
    */
}
