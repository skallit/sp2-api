<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitreports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visit_id');
            $table->dateTime('creationDate')->nullable();
            $table->string('comment', 2048)->nullable();
            $table->integer('starScore');
            $table->unsignedBigInteger('visitreportstate_id')->default(0);
            $table->timestamps();


            $table->foreign('visit_id', 'visitReports_ibfk_1')->references('id')->on('visits');
            $table->foreign('visitreportstate_id', 'visitReports_ibfk_2')->references('id')->on('visitreportstates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitReports');
    }
}
