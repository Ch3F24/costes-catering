<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationsTables extends Migration
{
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->integer('position')->unsigned()->nullable();
            $table->string('type',5)->nullable();

            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();

            // this will create the required columns to support nesting for this module
            $table->nestedSet();
        });

        Schema::create('navigation_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'navigation');
            $table->string('title', 200)->nullable();
            $table->string('url',255)->nullable();

        });




    }

    public function down()
    {

        Schema::dropIfExists('navigation_translations');
        Schema::dropIfExists('navigations');
    }
}
