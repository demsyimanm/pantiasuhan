<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('username')->unique();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamp('date')->nullable();
            $table->string('description',1000)->nullable();
            $table->string('poster',1000)->nullable();
            $table->timestamps();
        });

        Schema::create('video', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('link',1000)->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamps();
        });

        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('description',1000)->nullable();
            $table->timestamps();
        });

        Schema::create('alumni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('graduationDate')->nullable();
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
        Schema::drop('user');
        Schema::drop('post');
        Schema::drop('video');
        Schema::drop('schedule');
        Schema::drop('alumni');
    }
}
