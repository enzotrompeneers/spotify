<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Contest;
use App\Participation;
use App\Mail\sendAdmin;

class emailAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email the administrator when the contest ends.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //check only the contest that is active (change in db)
        echo "Command emailAdmin started...\n";
        $admin_email = User::where('isAdmin', 1)->value('email');

        $contest_available = Contest::all();
        $date_now = date('Y-m-d G:i:s ');

        $contest_id = 0;

        if (!$contest_available->isEmpty()) {
            foreach($contest_available as $contest) {
                if ($date_now > $contest['endDate']) {
                    $contest_id = $contest['id'];

                    $participants = Participation::with(['user'])->has('user')->orderBy('points', 'desc')->take(1)->get();
                    $winner_email = $participants[0]->user->email;
                    Mail::to($admin_email)->send(new sendAdmin($winner_email));

                    break;
                } 
            }
        }
        echo "Command emailAdmin DONE\n";

    }
}
