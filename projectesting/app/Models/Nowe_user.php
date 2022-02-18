<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Nowe_user extends Authenticatable
{
    use HasFactory;
    protected $table = "nowe_users";
    protected $primaryKey = "user_id";

    protected $fillable = ["user_full_name", "email", "user_picture",  "password", "user_is_active"];

    public function NoweUserType(){
        return $this->hasMany("App\Models\NoweUserType");
    }
    
}
