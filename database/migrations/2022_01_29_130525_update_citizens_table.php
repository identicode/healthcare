<?php

use App\Models\Citizen;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table((new Citizen())->getTable(), function (Blueprint $table) {
            $table->boolean('is_dead')->default(false)->after('ips');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table((new Citizen())->getTable(), function (Blueprint $table) {
            $table->dropColumn('is_dead');
        });
    }
}
