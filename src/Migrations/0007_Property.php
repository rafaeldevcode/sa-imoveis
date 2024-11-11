<?php

namespace Src\Migrations;

class Property extends ExecuteMigrations
{
    public $table = 'properties';

    public function up()
    {
        $this->integer('id')->primaryKey();
        $this->string('name', 255);
        $this->longtext('description')->nullable();
        $this->integer('code');
        $this->decimal('value', 12, 2)->nullable();
        $this->decimal('condominium', 10, 2)->nullable();
        $this->decimal('iptu', 10, 2)->nullable();
        $this->string('andress', 255);
        $this->text('location')->nullable();
        $this->json('details')->nullable();
        $this->json('videos')->nullable();
        $this->json('characteristics')->nullable();
        $this->string('status', 12)->default('disponivel');
        $this->string('type', 8);
        $this->string('progress', 13);
        $this->char('is_launch', 3)->default('off');
        $this->string('show_card', )->default('privative');
        $this->char('dimension', 10);
        $this->integer('user_id');
        $this->integer('category_id');

        $this->foreignKey('user_id')->references('id')->on('users');
        $this->foreignKey('category_id')->references('id')->on('categories');

        $this->timestamps();

        $this->create();
    }

    public function down()
    {
        $this->dropTable();
    }
}
