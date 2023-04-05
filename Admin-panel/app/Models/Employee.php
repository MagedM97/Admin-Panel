<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|string|email|max:255',
        'phone'=> 'required|numeric|min_digits:11|max_digits:11',
        
    ];
    public function company(){

        return $this->belongsTo(Company::class,'Company');
    }

    protected $fillable = [
        'First Name',
        'Last Name',
        'Email',
        'Phone',
        'Company'
    ];
}
