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
        Schema::create("projects",function(Blueprint $table){
       $table->id();
       $table->string("Project_name")->unique();
       $table->string("Project_Manager");
       $table->text("description");
       $table->date("start_Date");
       $table->date("End_date");
       $table->string("status")->default("active");
       $table->foreignId("user_id")->constrained("users")->cascadeOnDelete();
       $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
