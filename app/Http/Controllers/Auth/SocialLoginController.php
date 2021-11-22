<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamMember;
use Nette\Utils\Random;

class SocialLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function redirectToProvider($driver)
    {  
       return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        
        try {
            $user = Socialite::driver($driver)->user();

            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){

                $team = Team::create(['name' => 'personal_team','creator_id' => $user->id ]);

                TeamMember::create(['team_id' => $team->id , 'user_id' => $user->id]);

                $saveUser = User::updateOrCreate([
                    'social_id' => $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'social_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('customer.dashboard.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function logout()
    {
        if(auth()->user())
        {
            User::where('id',auth()->user()->id)->update(['last_login'=>now()]);

            Auth::logout();
        }

       return redirect(route('home'));

    }
}
