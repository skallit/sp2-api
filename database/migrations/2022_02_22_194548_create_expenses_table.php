<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expensesheets_id');
            $table->unsignedBigInteger('expensestates_id');
            $table->integer('quantity')->default(0);
            $table->date('creationDate');
            $table->timestamps();



            $table->foreign('expensesheets_id', 'expenses_ibfk_1')->references('id')->on('expensesheets');
            $table->foreign('expensestates_id', 'expenses_ibfk_2')->references('id')->on('expensestates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
