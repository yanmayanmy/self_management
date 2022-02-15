<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id')->nullable();
            $table->string("title", 100);
            $table->string("detail")->nullable();
            $table->string("category")->nullable(); //category table を別に用意して、任意でカテゴリを追加可にしたい。後回しでいいかも
            $table->datetime("start_time");
            $table->datetime("end_time");
            $table->integer("priority")->nullable();
            // 優先度は相対的に決めたい。最初に入力した予定の優先度を0として、その予定基準で優先度を決めれる機能を実装する予定。
            //if(Book::all() == null) ? first_schedule() : schedule(); 的な
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
        Schema::dropIfExists('books');
    }
}
