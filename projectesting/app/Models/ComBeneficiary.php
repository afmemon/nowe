<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComBeneficiary extends Model
{
    use HasFactory;

    protected $table = "com_beneficiary";
    protected $primaryKey = "beneficiary_id";

    protected $fillable = [
        "beneficiary_type_id",  
        "first_name",  
        "middle_name",  
        "last_name",  
        "gender",  
        "eligible_for_zakat", 
        "why_eligible_for_zakat",  
        "country_district_id",  
        "country_identification_number",  
        "date_of_birth",  
        "complete_address",  
        "contact_number",  
        "email",   
        "district_location_id",  
        "photo",   
        "is_active",  
        "status_comment",  
        "added_on",  
        "added_by"];

        public $timestamps = false;

}
