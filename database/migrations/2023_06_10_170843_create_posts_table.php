<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->integer('user_credential_id');
            $table->text('post_content');
            $table->timestamps();

            // $table
            //     ->foreign('user_credential_id')
            //     ->references('user_credential_id')
            //     ->on('t_user_credentials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_posts');
    }
}
