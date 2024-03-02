<?php

use yii\db\Migration;

/**
 * Class m210904_113309_team
 */
class m210904_113309_team extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("team", [
            'id' => $this->primaryKey(),
            'photo' =>$this->string(255)->notNull(),
            'name' =>$this->string(255)->notNull(),
            'position' =>$this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113309_team cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_113309_team cannot be reverted.\n";

        return false;
    }
    */
}
