<?php

use App\Models\Result;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('case_number');
            $table->integer('question1')->nullable();
            $table->integer('question2')->nullable();
            $table->integer('question3')->nullable();
            $table->integer('question4')->nullable();
            $table->string('question5')->default(Result::SURVEY_STATUS_FALSE)->nullable();
            $table->string('language')->nullable();
            $table->text('feedback')->nullable();
            $table->string('status')->default(Result::SURVEY_STATUS_CREATED)->nullable();
            $table->string('url')->nullable();
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
        Schema::dropIfExists('results');
    }
}
