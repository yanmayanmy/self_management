<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string("title", 100);
            $table->string("detail")->nullable();
            $table->string("category")->nullable(); //category table を別に用意して、任意でカテゴリを追加可にしたい。後回しでいいかも
            $table->datetime("deadline")->nullable();
            $table->integer("priority")->nullable();
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
        Schema::dropIfExists('projects');
    }
}
