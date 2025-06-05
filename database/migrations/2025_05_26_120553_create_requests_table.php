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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name',25);
            $table->string('female',50);
            $table->string('grade',2);
            $table->string('nationalcode',15);
            $table->string('phone',15);
            $table->string('story')->default('submit');
            $table->string('imgpath')->default('http://127.0.0.1:8000/storage/userimage/default.png');
            $table->dateTime('date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
