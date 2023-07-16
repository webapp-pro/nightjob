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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('nikename');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            // $table->tinyint('gender');
            $table->date('birthday')->default('0000-00-00');
            $table->string('telephone');
            // $table->string('street');
            // $table->string('province');
            // $table->string('current_job');
            // $table->string('title');
            // $table->text('overview');
            // $table->string('education');
            $table->string('password');
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
