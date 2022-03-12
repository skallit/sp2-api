<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseOutPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenseoutpackages', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('unit', 16);
            $table->unsignedBigInteger('expenseproofs_id')->nullable();
            $table->timestamps();


            $table->foreign('expenseproofs_id', 'expenseOutPackages_ibfk_1')->references('id')->on('expenseproofs');
            $table->foreign('id', 'expenseOutPackages_ibfk_2')->references('id')->on('expenses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenseOutPackages');
    }
}
