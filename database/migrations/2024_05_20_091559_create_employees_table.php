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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('phone_number')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();   
            $table->date('date_of_birth')->nullable();      
            $table->boolean('military_check')->nullable();   //type ??      //if he's male
            $table->string('portfolio')->nullable();             
            $table->string('skills')->nullable();           //p
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('city_id')->cascadeOnDelete()->nullable()->cascadeOnDelete();; 
            $table->foreignId('job_level_id')->nullable()->cascadeOnDelete();
            $table->foreignId('job_title_id')->nullable()->cascadeOnDelete(); 
            $table->foreignId('job_idustry_id')->nullable()->cascadeOnDelete();
            $table->foreignId('education_level_id')->nullable()->cascadeOnDelete(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
