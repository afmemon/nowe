<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoweUserRoleAssign extends Model
{
    use HasFactory;

    protected $table = 'nowe_user_role_assign';
    protected $primaryKey = "user_role_assign_id";

    protected $fillable = ["user_id" , "user_type_id", " partner_organization_id" , "country_id" , "country_district_id" , "is_role_active" ];
}
