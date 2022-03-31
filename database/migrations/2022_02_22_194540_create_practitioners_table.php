<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioners', function (Blueprint $table) {
            $table->id();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('meeting_online')->nullable();
            $table->string('status')->nullable();
            $table->string('tel')->nullable();
            $table->integer('notorietyCoeff')->nullable();
            $table->string('complementarySpeciality', 50)->nullable();
            $table->unsignedBigInteger('sectordistrict_id')->nullable();
            $table->timestamps();


            $table->foreign('sectordistrict_id', 'fk_practitioner_department1')->references('id')->on('sectordistricts')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practitioners');
    }
}
