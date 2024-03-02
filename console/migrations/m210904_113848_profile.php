<?php

use yii\db\Migration;

/**
 * Class m210904_113848_profile
 */
class m210904_113848_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("profile", [
            'id' => $this->primaryKey(),
            'user_id' =>$this->integer()->notNull(),
            'name' =>$this->string(255)->notNull(),
            'phone' => $this->string(25)->notNull()->unique(),
            'address' =>$this->string(255),
            'photo' =>$this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113848_profile cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210904_113848_profile cannot be reverted.\n";

        return false;
    }
    */
}
