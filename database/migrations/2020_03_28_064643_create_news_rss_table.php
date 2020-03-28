<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsRssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_rss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');

            $table->text('text');

            $table->string('email')->default("");

            $table->boolean('is_active')->default(false);

            $table->timestamp('active_at')->nulltable();

            //$table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('news_rss');
    }
}
