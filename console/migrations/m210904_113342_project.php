<?php

use yii\db\Migration;

/**
 * Class m210904_113342_project
 */
class m210904_113342_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("project", [
            'id' => $this->primaryKey(),
            'name' =>$this->string(255)->notNull(),
            'direction' =>$this->string(255)->notNull(),
            'duration' =>$this->string(255)->notNull(),
            'weight' =>$this->string(255)->notNull(),
            'info' =>$this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113342_project cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_113342_project cannot be reverted.\n";

        return false;
    }
    */
}
