<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizenReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizen_reports', function (Blueprint $table) {
            $table->id();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('suffix_name')->nullable();

            $table->string('purok')->nullable();

            $table->date('dob')->nullable();
            $table->enum('sex', ['MALE', 'FEMALE'])->nullable();
            $table->boolean('need_vaccine')->default(false);
            $table->boolean('need_vitamins')->default(false);
            $table->boolean('is_dead')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizen_reports');
    }
}
