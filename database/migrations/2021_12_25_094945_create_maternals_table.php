<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maternals', function (Blueprint $table) {
            $table->id();
            $table->double('weight')->nullable();
            $table->double('height')->nullable();
            $table->string('blood_preasure')->nullable();
            $table->string('tummy')->nullable();
            $table->integer('baby')->nullable();
            $table->json('props')->nullable();
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
        Schema::dropIfExists('maternals');
    }
}
