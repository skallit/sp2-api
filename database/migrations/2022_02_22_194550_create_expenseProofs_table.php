<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseProofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenseproofs', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('filePath', 512)->nullable();
            $table->unsignedBigInteger('expenseprooftypes_id');
            $table->dateTime('uploadDate');
            $table->timestamps();


            $table->foreign('expenseProofTypes_id', 'expenseProofs_ibfk_1')->references('id')->on('expenseprooftypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenseProofs');
    }
}
