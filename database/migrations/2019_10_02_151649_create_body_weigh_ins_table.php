<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyWeighInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_weigh_ins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('weight', 11, 2);

            $table->foreignId('day_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('body_weigh_ins');
    }
}
