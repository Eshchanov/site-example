<?php

use yii\db\Migration;

/**
 * Class m210904_113528_vacancy
 */
class m210904_113528_vacancy extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("vacancy", [
            'id' => $this->primaryKey(),
            'name' =>$this->string(255)->notNull(),
            'requirements' =>$this->text()->notNull(),
            'address' =>$this->string(255)->notNull(),
            'tel' =>$this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113528_vacancy cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_113528_vacancy cannot be reverted.\n";

        return false;
    }
    */
}
