<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyToReplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_to_replys', function (Blueprint $table) {
            $table->integer('receive_reply_id');
            $table->integer('receive_user_id');
            $table->string('receive_user_name');
            $table->string('receive_reply_content');
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
        Schema::dropIfExists('reply_to_replys');
    }
}
