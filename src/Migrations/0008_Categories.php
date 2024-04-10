<?php

namespace Src\Migrations;

class Categories extends ExecuteMigrations
{
    public $table = 'categories';

    public function up()
    {
        $this->integer('id')->primaryKey();
        $this->string('name', 50);
        $this->string('slug', 50)->unique();

        $this->timestamps();

        $this->create();
    }

    public function down()
    {
        $this->dropTable();
    }
}
