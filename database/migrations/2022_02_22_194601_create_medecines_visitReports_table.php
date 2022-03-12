<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedecinesVisitReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medecines_visitReports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medecine_id');
            $table->integer('quantity')->nullable();
            $table->unsignedBigInteger('visitreport_id');
            $table->timestamps();


            $table->foreign('visitreport_id', 'fk_offer_1')->references('id')->on('visitreports')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('medecine_id', 'fk_offer_2')->references('id')->on('medecines')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medecines_visitReports');
    }
}
