<?php

namespace Src\Migrations;

class BrokersAdjust extends ExecuteMigrations
{
    public $table = 'brokers';

    public function up()
    {
        $this->string('whatsapp', 20)->after('name')->nullable();

        $this->update();
    }
}
