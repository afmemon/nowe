<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComBeneficiaryType extends Model
{
    use HasFactory;

    protected $table = "com_beneficiary_type";
    protected $primaryKey = "beneficiary_type_id";
    
    protected $fillable = ["beneficiary_type"];
}
