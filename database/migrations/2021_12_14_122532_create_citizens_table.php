<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('household_id')->nullable()->constrained('households')->onDelete('set null');
            $table->json('name');
            $table->date('birthdate');
            $table->string('philhealth')->nullable();
            $table->enum('sex', ['MALE', 'FEMALE']);

            $table->boolean('4ps')->default(false);
            $table->boolean('ips')->default(false);

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
        Schema::dropIfExists('citizens');
    }
}
