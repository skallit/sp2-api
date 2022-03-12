<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expensesheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('ref', 4);
            $table->decimal('calculatedAmount', 10, 2)->nullable();
            $table->string('unit', 8);
            $table->unsignedBigInteger('sheetstate_id');
            $table->date('creationDate');
            $table->timestamps();

            $table->foreign('employee_id', 'fk_employe_ficheFrais')->references('id')->on('employees');
            $table->foreign('sheetstate_id', 'fk_etat_ficheFrais')->references('id')->on('expensesheetstates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenseSheets');
    }
}
