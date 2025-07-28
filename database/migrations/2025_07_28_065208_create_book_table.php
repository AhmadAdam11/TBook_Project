<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image');
            $table->unsignedBigInteger('category_id'); 
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('category_id') 
                  ->references('id')->on('categorys')
                  ->onDelete('cascade'); 
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};