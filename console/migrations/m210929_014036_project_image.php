<?php

use yii\db\Migration;

/**
 * Class m210929_014036_project_image
 */
class m210929_014036_project_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("project_image", [
            'id' => $this->primaryKey(),
            'project_id' =>$this->integer()->notNull(),
            'image' =>$this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210929_014036_project_image cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210929_014036_project_image cannot be reverted.\n";

        return false;
    }
    */
}
