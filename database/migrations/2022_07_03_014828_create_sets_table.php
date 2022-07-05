<?php

use App\Enums\MovementEffort;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('set_group_id')->constrained();
            $table->foreignId('movement_id')->constrained();
            $table->enum('performed_effort', array_column(MovementEffort::cases(), 'value'))->nullable();
            $table->unsignedMediumInteger('performed_time_constraint')->nullable();
            $table->tinyInteger('reps', false, true);
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
        Schema::dropIfExists('sets');
    }
};
