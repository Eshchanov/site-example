<?php

use yii\db\Migration;

/**
 * Class m220713_061447_add_column_to_user
 */
class m220713_061447_add_column_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'phone', $this->string()->after('username'));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'phone');
    }
}
