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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable()->cascadeOnDelete();
            $table->foreignId('job_title_id')->nullable()->cascadeOnDelete(); 
            $table->date('start_date')->nullable();      
            // $table->date('end_date')->nullable()->default(0);      //if it's 0-0-0 meaning 'until now'






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
