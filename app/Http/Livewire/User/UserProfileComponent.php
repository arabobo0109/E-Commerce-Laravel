<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserProfileComponent extends Component
{
    public function render()
    {
        $userProfile =Profile::where('user_id',Auth::user()->id)->first();
        if(!$userProfile)
        {
            $profile =new Profile();
            $profile->user_id =Auth::user()->id;
            $profile->save();
        }
        $user =User::find(Auth::user()->id);
        return view('livewire.user.user-profile-component',['user'=>$user])->layout('layouts.base');
    }
}
