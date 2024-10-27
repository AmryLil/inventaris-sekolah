<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class InfoUserController extends Controller
{

    public function create()
    {
        return view('laravel-examples/user-profile');
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name_222291' => ['required', 'max:50'],
            'email_222291' => ['required', 'email', 'max:50', Rule::unique('users_222291')->ignore(Auth::user()->id)],
            'phone_222291'     => ['max:50'],
            'location_222291' => ['max:70'],
            'about_me_222291'    => ['max:150'],
        ]);
        if($request->get('email_222291') != Auth::user()->email)
        {
            if(env('IS_DEMO') && Auth::user()->id == 1)
            {
                return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
                
            }
            
        }
        else{
            $attribute = request()->validate([
                'email_222291' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            ]);
        }
        
        
        User::where('id',Auth::user()->id)
        ->update([
            'name_222291'    => $attributes['name_222291'],
            'phone_222291'     => $attributes['phone_222291'],
            'location_222291' => $attributes['location_222291'],
            'about_me_222291'    => $attributes["about_me_222291"],
        ]);
        return redirect('/user-profile')->with('success','Profile updated successfully');
    }
}
