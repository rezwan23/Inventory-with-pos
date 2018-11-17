<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showUserProfile(Request $request, $id){
        $user = User::find($id);
        return view('userprofile', ['user'=>$user]);
    }
    public function updateUserProfile(Request $request, $id){
        $validatedData = $this->validate($request, [
            'name'  => 'required',
            'email' =>  'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:128',
            'business_name' =>  'required'
        ]);
        $image = $request->file('image');
        $uploadedImage = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $uploadedImage);
        $user = User::find($id);
        $validatedData['image'] = $uploadedImage;
        $user->update($validatedData);
        Session::flash('success-message', 'Profile Updated Successfully!');
        return redirect()->route('home');
    }
}
