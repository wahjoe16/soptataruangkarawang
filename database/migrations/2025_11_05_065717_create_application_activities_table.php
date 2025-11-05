<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('application_activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('application_id')->unsigned();
            $table->bigInteger('activity_id')->unsigned();
            $table->string('status')->default('0')->comment('0: pending, 1: finish');
            $table->timestamps();

            $table->foreign('application_id')->references('id')->on('applications');
            $table->foreign('activity_id')->references('id')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_activities');
    }
};
