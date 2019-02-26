<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{

    public function index(){
        return  User::all();
    }

    public function show ($id){
        return User::findOrFail($id);
    }

    // lo store non lo facciamo lato api... 

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')) {
            $avatar_file = $request->file('avatar');
            $user->updateAvatar($avatar_file);
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
}