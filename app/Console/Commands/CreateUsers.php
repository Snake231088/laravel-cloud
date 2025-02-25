<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-users {count}';

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
        $count = $this->argument('count');
        
        $users = [];
        for ($i = 0; $i < $count; $i++) {
            $users[] = [
                'name' => Str::random(),
                'email' => Str::uuid()->toString() . Str::random() . '@example.com',
                'email_verified_at' => now(),
                'password' => '',
                'remember_token' => Str::random(10),
            ];
        }
        
        User::query()->insert($users);
    }
}
