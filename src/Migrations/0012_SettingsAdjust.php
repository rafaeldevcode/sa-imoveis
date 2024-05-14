<?php

namespace Src\Migrations;

class SettingsAdjust extends ExecuteMigrations
{
    public $table = 'settings';

    public function up()
    {
        $this->json('cities')->after('about_company')->nullable();

        $this->update();
    }
}
