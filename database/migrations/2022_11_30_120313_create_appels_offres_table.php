<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppelsOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appels_offres', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable(true);
            $table->string('code')->nullable(true);
            $table->string('title')->nullable(true);
            $table->text('description')->nullable(true);
            $table->string('file')->nullable(true);
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
        Schema::dropIfExists('appels_offres');
    }
}
