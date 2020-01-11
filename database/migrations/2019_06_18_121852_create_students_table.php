<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identity',30)->unique();
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->enum('gender',['Masculino','Femenino']);
            // $table->date('birthdate');
            $table->longText('photo');
            $table->binary('photo_license');
            $table->longText('photo_license_2');
            $table->string('phone',255)->nullable();
            $table->string('email',255);
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
        Schema::dropIfExists('students');
    }
}
