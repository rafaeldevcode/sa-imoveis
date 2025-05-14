<?php

namespace Src\Migrations;

class PropertiesAdjust extends ExecuteMigrations
{
    public $table = 'properties';

    public function up()
    {
        $this->integer('highlighted_order')->after('is_highlighted')->default(0);

        $this->update();
    }

    public function down()
    {
        $this->dropTable();
    }
}
