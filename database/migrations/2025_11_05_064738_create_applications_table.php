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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('sop_id')->unsigned();
            $table->string('name');
            $table->string('name_applicant');
            $table->string('address_application')->nullable();
            $table->date('date_application')->nullable();
            $table->text('description')->nullable();
            $table->string('link_file')->nullable();
            $table->string('documents')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0: pending, 1: approved, 2: rejected');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sop_id')->references('id')->on('sops');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
