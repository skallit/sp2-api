<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsEmployeesPrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications_employees_privileges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employees_id');
            $table->unsignedBigInteger('applications_id');
            $table->unsignedBigInteger('privileges_id');
            $table->tinyInteger('activated');
            $table->timestamps();


            $table->unique(['applications_id', 'employees_id', 'privileges_id'], 'applications_id_2');
            $table->foreign('applications_id', 'applications_employees_privileges_ibfk_1')->references('id')->on('applications');
            $table->foreign('employees_id', 'applications_employees_privileges_ibfk_2')->references('id')->on('employees');
            $table->foreign('privileges_id', 'applications_employees_privileges_ibfk_3')->references('id')->on('privileges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications_employees_privileges');
    }
}
