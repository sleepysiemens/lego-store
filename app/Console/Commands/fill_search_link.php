<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class fill_search_link extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill_search_link';

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
        foreach (Product::all() as $product)
        {
            $product->search_line=$product->title.'/'.$product->number.'/'.$product->bricklink_number.'/'.$product->other_numbers;
            $product->update();
        }
        dd('succ');
    }
}
