<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensePackageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expensepackagetypes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('unit', 32)->nullable();
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
        Schema::dropIfExists('expensePackageTypes');
    }
}
