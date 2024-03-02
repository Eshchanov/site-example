<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%document}}`.
 */
class m231120_111938_add_column_to_document_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%document}}', 'c_order', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%document}}', 'c_order');
    }
}
