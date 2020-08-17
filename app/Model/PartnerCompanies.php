<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PartnerCompanies extends Model
{
    protected $table = 'partner_companies';
    protected $fillable = ['name', 'logo'];
}
