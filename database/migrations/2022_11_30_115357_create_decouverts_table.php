<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecouvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decouverts', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable(true);
            $table->string('title')->nullable(true);
            $table->string('image')->nullable(true);
            $table->text('description')->nullable(true);
            $table->string('caracteristique')->nullable(true);
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
        Schema::dropIfExists('decouverts');
    }
}