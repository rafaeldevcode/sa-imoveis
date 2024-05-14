<?php

namespace Src\Migrations;

class PropertiesAdjust extends ExecuteMigrations
{
    public $table = 'properties';

    public function up()
    {
        $this->char('is_highlighted', 3)->after('is_launch')->default('off');

        $this->update();
    }

    public function down()
    {
        $this->dropTable();
    }
}
