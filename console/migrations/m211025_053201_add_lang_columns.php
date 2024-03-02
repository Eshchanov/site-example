<?php

use yii\db\Migration;

/**
 * Class m211025_053201_add_lang_columns
 */
class m211025_053201_add_lang_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('region', 'lang', $this->integer()->notNull()->defaultValue(3));
        $this->addColumn('office', 'lang', $this->integer()->notNull()->defaultValue(3));
        $this->addColumn('faq', 'lang', $this->integer()->notNull()->defaultValue(3));
        $this->addColumn('condition', 'lang', $this->integer()->notNull()->defaultValue(3));
        $this->addColumn('team', 'lang', $this->integer()->notNull()->defaultValue(3));
        $this->addColumn('project', 'lang', $this->integer()->notNull()->defaultValue(3));
        $this->addColumn('news', 'lang', $this->integer()->notNull()->defaultValue(3));
        $this->addColumn('review', 'lang', $this->integer()->notNull()->defaultValue(3));
        $this->addColumn('vacancy', 'lang', $this->integer()->notNull()->defaultValue(3));
        $this->addColumn('privancy_policy', 'lang', $this->integer()->notNull()->defaultValue(3));
        $this->addColumn('services', 'lang', $this->integer()->notNull()->defaultValue(3));
        $this->addColumn('general', 'lang', $this->integer()->notNull()->defaultValue(3));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211025_053201_add_lang_columns cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211025_053201_add_lang_columns cannot be reverted.\n";

        return false;
    }
    */
}
