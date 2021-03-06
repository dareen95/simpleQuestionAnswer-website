<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table)
        {
            $table->id();


            $table->text("content");
            $table->integer('score')->default(0);
            $table->boolean('accepted')->default(0);
            $table->bigInteger('question_id')->unsigned()->default(0);
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')
->onUpdate('cascade');
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
        Schema::dropIfExists('answers');
    }
}
