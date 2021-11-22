<?php

namespace App\Console\Commands;


use App\Models\Link;
use App\Models\Scan;
use App\Models\User;
use App\Notifications\LinkIsDownNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ScanStarterMemberShipLinkCommand extends Command
{
  
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:starter-membership';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'start scaning the links starter membership';

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
        $starterMemberShipUsersIds = User::where('membership_id' , User::Starter_MemberShip)->pluck('id')->toArray();

        $links = Link::whereIn('added_by' , $starterMemberShipUsersIds)->get();

        foreach($links as $link)
        {
        $response  = Http::get($link->url);

           $scan = Scan::create(['link_id' => $link->id,'team_id' => 
                           $link->team_id, 'http_status_code' => $response->status(),
                            'response_time' => '11111',
                            'scaned_at' => now()]);

             $scanedLink = Scan::whereId($scan->id)->with('team.members.user')->first(); 

             if($scanedLink->isDown)
             {
                $this->notifyTeamMembers($scanedLink);   
             }
        }
    }

    private function notifyTeamMembers(Link $scanedLink)
    {
        foreach($scanedLink->team->members as $member)
        {
          return $member->user->notify(new LinkIsDownNotification($scanedLink));
        }
    }
}
