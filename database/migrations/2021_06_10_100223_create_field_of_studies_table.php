<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldOfStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_of_studies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('university_id');
            $table->integer('college_id');
            $table->integer('department_id');
            $table->double('acceptance_percentage');
            $table->integer('qualified_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('field_of_studies');
    }
}
