<?php

namespace Src\Migrations;

class SettingsAdjust extends ExecuteMigrations
{
    public $table = 'settings';

    public function up()
    {
        $this->integer('home_featured_mob')->after('site_bg_login')->nullable();
        $this->integer('home_featured_desk')->after('site_bg_login')->nullable();

        $this->update();
    }
}
