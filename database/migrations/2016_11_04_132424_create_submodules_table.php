<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSubmodulesTable.
 *
 */
class CreateSubmodulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submodules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('total_hours')->nullable();
            $table->date('week_hours')->nullable();
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->timestamps();
        });

        Schema::create('module_submodule', function (Blueprint $table) {
            $table->integer('module_id')->unsigned();
            $table->integer('submodule_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('submodule_classroom', function (Blueprint $table) {
            $table->integer('submodule_id')->unsigned();
            $table->integer('classroom_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('course_submodule', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('submodule_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submodules');
        Schema::dropIfExists('module_submodule');
        Schema::dropIfExists('submodule_classroom');
        Schema::dropIfExists('course_submodule');
    }
}