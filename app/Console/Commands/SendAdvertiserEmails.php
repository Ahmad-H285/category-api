<?php

namespace App\Console\Commands;

use App\Models\Ad;
use App\Models\Advertiser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAdvertiserEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:advertisers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder email to advertisers that have scheduled ads to be run next day';

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
     * @return int
     */
    public function handle()
    {
        $today = today()->format('Y-m-d');
        $scheduledAds = Ad::where('start_date', '>=', $today)->get();

        foreach ($scheduledAds as $scheduledAd) {
            $advertiserEmail = Advertiser::find($scheduledAd->advertiser)->first()->email;

            Mail::to($advertiserEmail);
        }
    }
}
