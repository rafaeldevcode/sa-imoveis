<?php

namespace Src\Migrations;

class Brokers extends ExecuteMigrations
{
    public $table = 'brokers';

    public function up()
    {
        $this->integer('id')->primaryKey();
        $this->string('name', 50);
        $this->char('show_in_home', 3)->default('on');
        $this->integer('thumbnail');

        $this->foreignKey('thumbnail')->references('id')->on('gallery');

        $this->timestamps();

        $this->create();
    }

    public function down()
    {
        $this->dropTable();
    }
}
