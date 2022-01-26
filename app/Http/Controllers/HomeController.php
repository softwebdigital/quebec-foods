<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('user.profile.index');
    }

    public static function createDirectoryIfNotExists($path)
    {
        if (!file_exists($path)) {
            File::makeDirectory($path);
        }
    }

    public function updateProfile(Request $request)
    {
        // return $request->all();
        // Validate request
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required'],
            'state' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'nk_name' => ['required'],
            'nk_phone' => ['required'],
            'nk_address' => ['required'],
            'avatar' => ['sometimes', 'mimes:jpg,png,jpeg', 'max:2048'],
        ],[
            'nk_name.required' => 'The next of kin name is required',
            'nk_phone.required' => 'The next of kin phone is required',
            'nk_address.required' => 'The next of kin address is required'
        ]);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator)->with('error', 'Invalid input data');
        }
        // Collect data from request
        $data = $request->only([
            'first_name', 'last_name', 'phone', 'state', 'country', 'city',
            'address', 'nk_name', 'nk_phone', 'nk_address']);
        // Check if user uploaded file and save
        if ($request->file('avatar') || $request['avatar_remove']){
            if ($oldAvatar = auth()->user()['avatar'])
                try {
                    unlink($oldAvatar);
                    $data['avatar'] = null;
                } catch(\Exception $e){}
            if ($request->file('avatar')) {
                $destinationPath = 'assets/photos'; // upload path
                static::createDirectoryIfNotExists($destinationPath);
                $transferImage = \auth()->user()['id'].'-'. time() . '.' . $request['avatar']->getClientOriginalExtension();
                $image = Image::make($request->file('avatar'));
                $image->save($destinationPath . '/' . $transferImage, 40);
                $data['avatar'] = $destinationPath ."/".$transferImage;
            }
        }
        // Update profile
        if (auth()->user()->update($data)){
            if (auth()->user()['gotMail'] == 0) {
                NotificationController::sendWelcomeEmailNotification(auth()->user());
                auth()->user()->update(['gotMail' => 1]);
            }
            return back()->with('success', 'Profile updated successfully');
        }
        return back()->withInput()->with('error', 'Error updating profile');
    }
}
