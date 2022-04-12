<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5)->nullable();
            $table->unsignedBigInteger('leader_id')->nullable();
            $table->unsignedBigInteger('sectordistrict_id');
            $table->string('postalCode')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email', 45)->nullable();
            $table->text('password')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->dateTime('releaseDate')->nullable();
            $table->date('entryDate')->nullable();
            $table->string('token', 64)->nullable();
            $table->integer('timespan')->nullable();
            $table->timestamps();


            $table->foreign('sectordistrict_id', 'fk_departement')->references('id')->on('sectordistricts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
