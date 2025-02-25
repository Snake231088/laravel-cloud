<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Str;

class CreateUsers implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly int $count = 10000)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = [];
        for ($j = 0; $j < $this->count; $j++) {
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
