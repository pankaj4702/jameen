<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class SendBirthdayWishes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-birthday-wishes';

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
        dd('test');
        $today = now()->format('m-d');

        // Retrieve users whose birthday is today
        $users = User::whereRaw("DATE_FORMAT(dob, '%m-%d') = ?", [$today])->get();
        // dd($users);

        foreach ($users as $user) {
            dispatch(new \App\Jobs\SendBirthdayWishesJob($user->email));
        }

        $this->info('Birthday wishes sent successfully!');
    }
}
