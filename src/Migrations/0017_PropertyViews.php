<?php

namespace Src\Migrations;

class PropertyViews extends ExecuteMigrations
{
    public $table = 'property_views';

    public function up()
    {
        $this->integer('id')->primaryKey();
        $this->integer('property_id');
        $this->datetime('date');

        $this->foreignKey('property_id')->references('id')->on('properties');

        $this->timestamps();

        $this->create();
    }

    public function down()
    {
        $this->dropTable();
    }
}
