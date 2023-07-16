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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('occategory', 30);
            $table->string('bucategory', 30);
            $table->unsignedSmallInteger('vacancy_count');
            $table->string('spcategory', 30);
            $table->string('salary', 30);
            $table->string('locategory', 30);
            $table->timestamp('deadline');
            $table->string('experience')->default('');
            $table->string('skills')->default('');
            $table->text('description');
            $table->unsignedMediumInteger('views')->default(1);
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
        Schema::dropIfExists('posts');
    }
}
