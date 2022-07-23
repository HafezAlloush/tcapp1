<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainee extends Model
{
    use HasFactory;
    protected $fillable = [
        'PID',
        'first_name',
        'father_name',
        'grand_name',
        'family_name',
        'full_name',
        'birth_date',
        'city',
        'street',
        'mobile1',
        'mobile2',
        'department_id'
    ];
    public function department(){
        return $this->hasOne(Department::class);
    }
}
