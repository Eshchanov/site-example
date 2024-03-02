<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%slider}}`.
 */
class m231123_105306_add_url_column_to_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%slider}}', 'url', $this->string()->defaultValue('#'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%slider}}', 'url');
    }
}
