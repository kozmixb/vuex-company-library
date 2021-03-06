<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Employee extends Model
{
    protected $fillable = ['name','company_id'];
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
