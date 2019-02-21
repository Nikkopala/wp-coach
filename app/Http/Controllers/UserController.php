<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index(){
        return  User::all();
    }

    public function show ($id){
        return User::findOrFail($id);
    }

    public function profile (){
        return view('profile');
    }

    public function show_avatar(){
        try {
            $storagePath = storage_path('app/avatar/' . \Auth::user()->avatar);
            $output = new \Symfony\Component\Console\Output\ConsoleOutput();
            $output->writeln($storagePath);
            $avatar = Image::make($storagePath)->response();
        } catch( NotReadableException $e) {
            $storagePath = storage_path('app/avatar/user.png');
            $avatar = Image::make($storagePath)->response();
        } finally  {
            return $avatar;
        }
    }

    public function upload_avatar(Request $request){
        $path = $request->file('avatar-image')->store('avatar');
        $name = basename($path);
        $user = \Auth::user();
        if ($user->avatar) {
            Storage::delete('avatar/' .$user->avatar);
        }
        $user->avatar = $name;
        $user->save();
        return view('profile');
    }
}