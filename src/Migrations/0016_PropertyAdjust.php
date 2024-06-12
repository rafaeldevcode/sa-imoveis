<?php

namespace Src\Migrations;

class PropertyAdjust extends ExecuteMigrations
{
    public $table = 'properties';

    public function up()
    {
        $this->string('city', 60)->after('location');

        $this->update();
    }
}
