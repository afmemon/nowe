<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerOrganization extends Model
{
    use HasFactory;

    protected $table = "partner_organization";
    protected $primaryKey = "partner_organization_id";

    protected $fillable = ["partner_organization_name"];
}
