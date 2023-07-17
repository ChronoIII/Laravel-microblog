<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_user_profile', function (Blueprint $table) {
            $table->bigIncrements('user_profile_id');
            $table->integer('user_credential_id');
            $table->text('first_name');
            $table->text('last_name');
            $table->timestamp('birthdate')->nullable();
            $table->text('profile_image_path')->nullable();
            $table->text('cover_image_path')->nullable();
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
        Schema::dropIfExists('t_user_profile');
    }
}
