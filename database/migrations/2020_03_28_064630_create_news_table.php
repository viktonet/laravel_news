<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('category_id');
            $table->integer('user_id');

            $table->string('slug')->unique();
            $table->string('title');

            $table->text('content_raw');
            $table->text('content_html');

            $table->boolean('is_published')->default(false);

            $table->timestamp('published_at')->nulltable();


          //  $table->foreign('user_id')->references('id')->on('users');
          //  $table->foreign('category_id')->references('id')->on('news_categories');
            $table->index('is_published');

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
        Schema::dropIfExists('news');
    }
}
