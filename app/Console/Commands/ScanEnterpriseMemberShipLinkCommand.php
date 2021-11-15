<?php

namespace App\Console\Commands;


use App\Models\Link;
use App\Models\Scan;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ScanEnterpriseMemberShipLinkCommand extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:enterprise-membership';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'start scaning the links enterprise membership ';

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
        $businessMemberShipUsersIds = User::where('membership_id' , User::Enterprise_MemberShip)->pluck('id')->toArray();

        $links = Link::whereIn('added_by' , $businessMemberShipUsersIds)->get();

        foreach($links as $link)
        {
            $response  = Http::get($link->url);

            Scan::create([ 'link_id' => $link->id,'team_id' => $link->team_id, 'http_status_code' => $response->status(),'scaned_at' => now()]);
        }
    }
}
