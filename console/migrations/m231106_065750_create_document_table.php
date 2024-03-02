<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%document}}`.
 */
class m231106_065750_create_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%document}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'file' => $this->string(),
            'date' => $this->string(),
            'type' => $this->string(),
            'created' => $this->string(),
            'active' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%document}}');
    }
}
