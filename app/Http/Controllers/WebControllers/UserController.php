<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    public function profile (){
        return view('profile');
    }

    public function show_avatar(){
        try {
            $storagePath = storage_path('app/avatar/' . \Auth::user()->avatar);
            // $output = new \Symfony\Component\Console\Output\ConsoleOutput();
            // $output->writeln($storagePath);
            $avatar = Image::make($storagePath)->response();
        } catch( NotReadableException $e) {
            $storagePath = storage_path('app/avatar/user.png');
            $avatar = Image::make($storagePath)->response();
        } finally  {
            return $avatar;
        }
    }

    public function save(Request $request){
        // se c'è prendi l'immagine dal form
        if (Input::hasFile('avatar-image')){
            $avatar_file = Input::file('avatar-image');
            $user = \Auth::user();
            // salva l'immagine 
            try{
                $user->updateAvatar($avatar_file);
                $class= 'success';
                $message = 'Task was successful!';
            } catch (NotReadableException $e) {
                $class = 'danger';
                $message = $e->getMessage();
            }
        }
        return back()->with($class, $message);
    }
}