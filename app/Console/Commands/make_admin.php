<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class make_admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make_admin';

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
        $data=
            [
                'name' => 'admin',
                'surname' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin1234'),
            ];
        User::create($data);

        dd('succ');
    }
}
