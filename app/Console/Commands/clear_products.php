<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class clear_products extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear_products';

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
            $product->delete();
        }
        dd('succ');
    }
}
