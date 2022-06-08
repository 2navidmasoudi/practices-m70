<?php

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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('full_name');
            $table->boolean('has_inside_wash')->default(false);
            $table->boolean('has_outside_wash')->default(false);
            $table->boolean('has_premium_wash')->default(false);
            $table->string('ticket_number')->nullable();
            $table->dateTime('time_of_arrival')->default(now());
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
        Schema::dropIfExists('tickets');
    }
};
