<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComDistrictLocation extends Model
{
    use HasFactory;

    protected $table = "com_district_location";
    protected $primaryKey = "district_location_id";

    protected $fillable = [ "city_or_village", "country_district_id",  "is_active"];

}
