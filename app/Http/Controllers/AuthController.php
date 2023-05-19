<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function postResgister(Request $request){
        // dd($request->all());
        // validatiom mta3 user
        $request->validate([
        'name'=>'required|min:3|max:255',
        'email'=>'required|email|max:255|unique:users',
        'password'=>'required|min:8|confirmed',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 

    ]);
    // Check if the image field exists 

    if ($request->hasFile('image')) { 
        $image_name = time() . rand(0, 9999) . '.' . $request->image->getClientOriginalExtension(); 
        $request->image->storeAs('public/users', $image_name);
    }
    
    // register
    $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'image' => $image_name,
    ]);

    

    Auth::login($user);

    
    if(Auth::user() && Auth::user()->is_admin)
        {
            return redirect()->route('adminPanel.getChartData');
        
        }
        else
    {
        return redirect()->route('home');
    }

    }
    public function logout()
        {
            Auth::logout();
            return redirect()->route('home');

        }


        public function postLogin(Request $request){ 
            // validate 
            $details = $request->validate([ 
                'email'=>'Required|email', 
                'password'=>'Required', 
            ]); 
            // login 
            // attempt to authenticate user
            if (Auth::attempt($details)) { 
                if (Auth::user()->is_admin) { // check if user is admin
                    return redirect()->route('adminPanel.getChartData'); // redirect to admin panel
                } else {
                    return redirect()->route('home'); // redirect to home page for regular user
                }
            } 
            // return 
            return back()->withErrors([ 
                'email'=>'invalid login details' 
            ]); 
        } 

}
