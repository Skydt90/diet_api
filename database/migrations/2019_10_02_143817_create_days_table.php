<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->decimal('goal_weight', 11, 2);
            $table->decimal('morning_weight', 11, 2);
            $table->decimal('allowed_food_intake', 11, 2);

            $table->foreignId('diet_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('days');
    }
}
