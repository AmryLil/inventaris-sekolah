<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_222291', function (Blueprint $table) {
            $table->id();
            $table->string('name_222291');
            $table->string('email_222291')->unique();
            $table->string('password_222291');
            $table->string('role_222291');
            $table->bigInteger('phone_222291')->nullable();
            $table->string('location_222291')->nullable();
            $table->string('about_me_222291')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
