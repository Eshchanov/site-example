<?php

use yii\db\Migration;

class m220418_105107_add_column_to_office extends Migration
{
    public function up()
    {
        $this->addColumn('{{%office}}', 'video_link', $this->string()->after('address_link'));
    }

    public function down()
    {
        $this->dropColumn('{{%office}}', 'video_link');
    }
}
