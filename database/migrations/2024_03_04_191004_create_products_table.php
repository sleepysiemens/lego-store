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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('img')->nullable();
            $table->integer('color_id')->nullable();
            $table->string('number')->unique();
            $table->string('bricklink_number')->nullable();
            $table->string('other_numbers')->nullable();
            $table->decimal('price')->default(1);
            $table->integer('amount')->default(1);

            $table->boolean('is_available')->default(true);
            $table->integer('category_id')->nullable();

            $table->decimal('weight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
