<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComCountry extends Model
{
    use HasFactory;
    protected $table = "com_country";
    protected $primaryKey = "cont_id";

    protected $fillable = ["cont_name"];
    
}
