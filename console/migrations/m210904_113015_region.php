<?php

use yii\db\Migration;

/**
 * Class m210904_113015_region
 */
class m210904_113015_region extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("region", [
            'id' => $this->primaryKey(),
            'name' =>$this->string(255)->notNull(),
        ]);

        $this->insert('region', [
            'name' => 'Andijon viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Farg’ona viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Namangan viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Sirdaryo viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Jizzax viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Navoiy viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Samarqand viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Buxoro viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Qashqadaryo viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Surxandaryo viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Xorazm viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Qoraqolpog’iston Respublikasi',
        ]);
        $this->insert('region', [
            'name' => 'Toshkent viloyati',
        ]);
        $this->insert('region', [
            'name' => 'Toshkent shahri',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210904_113015_region cannot be reverted.\n";

        return false;
    }
}
