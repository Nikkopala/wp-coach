<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    ////////////////////////////////////////////////////////////////////////////////////
    //                                    API                                         //
    ////////////////////////////////////////////////////////////////////////////////////
    public function index(){
        return  User::all();
    }

    public function show ($id){
        return User::findOrFail($id);
    }

    // lo store non lo facciamo lato api, ci si re

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')) {
            $avatar_file = $request->file('avatar');
            $this->update_avatar($avatar_file, $user);
        }
        if ($request->input('name')){
            $user->name = $request->input('name');
            $user->save();
        }
        return $user;
    }

    public function delete(Request $request, $id){
        $user = User::findOrFail($id);
        $user->delete();
        return 204;
    }

    ////////////////////////////////////////////////////////////////////////////////////
    //                                    WEB                                         //
    ////////////////////////////////////////////////////////////////////////////////////

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

    public function save(Request $request){
        // se c'è prendi l'immagine dal form
        if (Input::hasFile('avatar-image')){
            $avatar_file = Input::file('avatar-image');
            $user = \Auth::user();
            // salva l'immagine al 
            $this->update_avatar($avatar_file, $user);
        }
        // TODO: ? vogliamo ? rendere modificabile e salvabile anche il nome
        return back();
    }

    ////////////////////////////////////////////////////////////////////////////////////
    //                                   private                                      //
    ////////////////////////////////////////////////////////////////////////////////////

    function  update_avatar($avatar_file, $user){
        // resize dell'immagine
        $avatar_image = Image::make($avatar_file)->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
         // crea il nome del file e salvala sul file sistem
        $file_name = md5(time()) . '.png';
        $avatar_image->save(storage_path('app/avatar/'. $file_name));
        // controlla sul db se c'è già un file per questo utente 
        if ($user->avatar) {
            // se c'è cancellalo
            Storage::delete('avatar/' .$user->avatar);
        }
        // salva sul db il nome del file nuovo
        $user->avatar = $file_name;
        $user->save();
    }
}