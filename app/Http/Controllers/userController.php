<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //get users
    public function getUsers()
{
    $users = User::orderBy('created_at', 'desc')->paginate(7); // Fetch users with pagination
    
    return view('adminPanel.users.index', compact('users'));
}
public function editProfile(){
    $userId = Auth::id();
    $user=user::findOrFail($userId);
    
    return view('user.settings.index',['user'=>$user]);

    
}


public function updateProfile(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        'name' => 'required|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    
    $user = User::findOrFail($id);
    
    // Check if the authenticated user's ID matches the user ID being updated
    if ($user->id != auth()->user()->id) {
        return redirect()->back()->with('error', 'You are not authorized to update this user.');
    }
    
    // Update the user's name
    $user->name = $request->name;
    
    // Update the user's image if provided
    if ($request->hasFile('image')) {
        $image_name = time() . rand(0, 9999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public/users', $image_name);
        $user->image = $image_name;
    }
    
    // Save the changes to the database
    $user->save();
    
    // Return a response
    return back()->with('success', 'User updated successfully.');
}

public function changePassword(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8',
        'confirm_password' => 'required|same:new_password',
    ]);

    $user = User::findOrFail($id);
    
    // Check if the authenticated user's ID matches the user ID being updated
    if ($user->id != auth()->user()->id) {
        return redirect()->back()->with('error', 'You are not authorized to change the password for this user.');
    }

    // Check if the current password matches the user's actual password
    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->with('error', 'Current password is incorrect.');
    }

    // Update the user's password
    $user->password = Hash::make($request->new_password);

    // Save the changes to the database
    $user->save();

    // Return a response
    return redirect()->back()->with('success', 'Password changed successfully.');
}

}
