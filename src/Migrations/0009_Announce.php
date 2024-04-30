<?php

namespace Src\Migrations;

class Announce extends ExecuteMigrations
{
    public $table = 'announce';

    public function up()
    {
        $this->integer('id')->primaryKey();
        $this->string('title', 255);
        $this->string('button_text', 100);
        $this->text('button_link');
        $this->longtext('content')->nullable();
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
