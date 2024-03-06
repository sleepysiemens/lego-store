<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class categories_fill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:categories_fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Category::all() as $category)
            $category->delete();

        $data=
            [
                [
                    'id'=>1,
                    'title_ru'=>'Детали',
                    'title_en'=>'Bricks',
                    'url'=>'bricks',
                    'img'=>'bricks.png',
                ],
                [
                    'id'=>2,
                    'title_ru'=>'Минифигурки',
                    'title_en'=>'Minifigures',
                    'url'=>'minifigs',
                    'img'=>'minifigures.png',
                ],
                [
                    'id'=>3,
                    'title_ru'=>'Наборы',
                    'title_en'=>'Sets',
                    'url'=>'sets',
                    'img'=>'sets.png',
                ],
            ];

        foreach ($data as $fill)
        {
            Category::create($fill);
        }
        dd('succ');

    }
}
