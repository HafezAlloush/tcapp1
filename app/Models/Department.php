<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $fillable=[
        'name', 
        'director_name'

    ];
    public function trainees(){
        return $this->hasMany('App\Models\Trainee');
    }
}
