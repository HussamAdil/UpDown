<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        public function __construct()
        {
        $this->middleware(function($request,$next)
        {
            if(Auth::check())
                    {
                    $notificationInvitations =  Invitation::where('email' , auth()->user()->email)
                    ->where('read_at'.null)->get();
                    
                    View::share('notificationInvitations', $notificationInvitations);
                   }
            if(session('success_message'))
            {
                Alert::toast(session('success_message'), 'success');    
            };

            return $next($request);
        });
    }
}
