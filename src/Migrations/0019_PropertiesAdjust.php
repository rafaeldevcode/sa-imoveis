<?php

namespace Src\Migrations;

class PropertiesAdjust extends ExecuteMigrations
{
    public $table = 'properties';

    public function up()
    {
        $this->decimal('value_promotion', 12, 2)->after('value')->nullable()->default(0);

        $this->update();
    }

    public function down()
    {
        $this->dropTable();
    }
}
