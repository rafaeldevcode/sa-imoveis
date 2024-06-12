<?php

namespace Src\Migrations;

class Economic extends ExecuteMigrations
{
    public $table = 'economic';

    public function up()
    {
        $this->integer('id')->primaryKey();
        $this->char('type', 4);
        $this->char('month', 2);
        $this->year('year');
        $this->char('percentage_month', 6);
        $this->char('percentage_year', 6);

        $this->timestamps();

        $this->create();
    }

    public function down()
    {
        $this->dropTable();
    }
}
