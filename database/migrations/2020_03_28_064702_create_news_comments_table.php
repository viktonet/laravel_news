<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_comments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('parent_id')->unsignet()->default(0);
            $table->integer('user_id');
            $table->integer('news_id');

            $table->text('text');

            $table->boolean('is_published')->default(false);

            $table->timestamp('published_at')->nulltable();

          //  $table->foreign('user_id')->references('id')->on('users');
          //  $table->foreign('news_id')->references('id')->on('news');

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
        Schema::dropIfExists('news_comments');
    }
}
