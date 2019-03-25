<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Company extends Model
{
    protected $fillable = ['name'];
    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
