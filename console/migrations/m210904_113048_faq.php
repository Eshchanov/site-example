<?php

use yii\db\Migration;

/**
 * Class m210904_113048_faq
 */
class m210904_113048_faq extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("faq", [
            'id' => $this->primaryKey(),
            'question' =>$this->text()->notNull(),
            'answer' =>$this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113048_faq cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_113048_faq cannot be reverted.\n";

        return false;
    }
    */
}
