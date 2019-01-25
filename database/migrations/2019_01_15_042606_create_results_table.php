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
            $table->integer('question1');
            $table->integer('question2');
            $table->integer('question3');
            $table->integer('question4');
            $table->boolean('question5');
            $table->string('language');
            $table->text('feedback');
            $table->string('status')->default(Result::STATUS_INCOMPLETE);
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
