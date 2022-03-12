<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseInPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenseinpackages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expensepackagetype_id');
            $table->timestamps();


            $table->foreign('id', 'expenseInPackages_ibfk_1')->references('id')->on('expenses');
            $table->foreign('expensepackagetype_id', 'fk_packageCost_packageType1')->references('id')->on('expensepackagetypes')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenseInPackages');
    }
}
