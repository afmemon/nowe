<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoweUserType extends Model
{
    use HasFactory;

    protected $table = "nowe_user_type";
    protected $primaryKey = "user_type_id";

    protected $fillable = ["user_type"];

    public function Nowe_user(){
        return $this->belongsToMany("App\Models\Nowe_user");
    }
    
}
