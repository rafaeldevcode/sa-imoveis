<?php

namespace Src\Migrations;

class PropertyImages extends ExecuteMigrations
{
    public $table = 'property_images';

    public function up()
    {
        $this->integer('property_id');
        $this->integer('image_id');

        $this->create();
    }

    public function down()
    {
        $this->dropTable();
    }
}
