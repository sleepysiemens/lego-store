<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('url')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();

            $table->string('img')->nullable();
        });

        $data=
            [
                [
                    'title_ru'=>'Детали',
                    'title_en'=>'Bricks',
                    'url'=>'bricks',
                ],
                [
                    'title_ru'=>'Минифигурки',
                    'title_en'=>'Minifigures',
                    'url'=>'minifigs',
                ],
                [
                    'title_ru'=>'Наборы',
                    'title_en'=>'Sets',
                    'url'=>'sets',
                ],
            ];
        foreach ($data as $data_)
            Category::create($data_);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
