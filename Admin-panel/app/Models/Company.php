<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public static $rules = [
        'name' => 'required',
        'logo' => 'dimensions:min_width=100,min_height=100',
        'website'=> 'required|url',
        'email' => 'required|string|email|max:255'
        
    ];
    protected $fillable =['Name','Email','Website','Logo'];
}
