<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%document}}`.
 */
class m231121_052140_add_column_to_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%document}}', 'lang', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%document}}', 'lang');
    }
}
