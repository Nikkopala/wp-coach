<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Intervention\Image\Facades\Image;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function updateAvatar ($file){
        $user = $this;
        // resize dell'immagine
        $avatar_image = Image::make($file)->resize(200, 200, function ($constraint) {
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
