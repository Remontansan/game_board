<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replys', function (Blueprint $table) {
            $table->integer('board_id')->nullable();
            $table->integer('receive_reply_id')->nullable();
            $table->integer('receive_user_id')->nullable();
            $table->string('receive_user_name')->nullable();
            $table->string('receive_reply_content')->nullable();
            $table->increments('send_reply_id');
            $table->integer('send_user_id');
            $table->string('send_user_name');
            $table->string('send_reply_content');
            $table->timestamp('updated_at')->useCurrent()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replys');
    }
}
