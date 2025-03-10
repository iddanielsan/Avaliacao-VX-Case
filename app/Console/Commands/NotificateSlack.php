<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\SendNotification;
Use App\Models\User;

class NotificateSlack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slack:notificate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification to slack';

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
        User::notify(new SendNotification());
    }
}
