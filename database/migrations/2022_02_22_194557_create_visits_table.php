<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practitioner_id')->default(0);
            $table->unsignedBigInteger('employee_id')->default(0);
            $table->dateTime('attendedDate')->nullable();
            $table->unsignedBigInteger('visitstate_id')->default(0);
            $table->timestamps();


            $table->foreign('employee_id', 'visits_ibfk_1')->references('id')->on('employees');
            $table->foreign('visitState_id', 'visits_ibfk_3')->references('id')->on('visitstates');
            $table->foreign('practitioner_id', 'visits_ibfk_4')->references('id')->on('practitioners');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
