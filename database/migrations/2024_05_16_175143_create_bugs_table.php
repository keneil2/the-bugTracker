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
        Schema::create('bugs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users","id")->cascadeOnDelete();
            $table->string("title");
            $table->text("description");
            $table->enum("type",["Bug","Error","Issue"])->default("Issue");
            $table->enum("priority",["Low","High","Medium"])->default("medium");
            $table->enum("severity",['minor', 'major', 'critical'])->default("minor");
            $table->foreignId("assigned_to")->constrained("users","id")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bugs');
    }
};
