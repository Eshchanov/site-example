<?php

use yii\db\Migration;

/**
 * Class m220816_105205_add_column_to_slider
 */
class m220816_105205_add_column_to_slider extends Migration
{
    public function up()
    {
        $this->addColumn('{{%slider}}', 'order', $this->integer()->defaultValue(10000)->after('image'));
    }

    public function down()
    {
        $this->dropColumn('{{%slider}}', 'order');
    }
}
