<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'PID',
        'first_name',
        'father_name',
        'grand_name',
        // 'full_name',
        'family_name',
        'city',
        'birth_date',
        'street',
        'mobile1',
        'mobile2',
        'department_id'
    ];

    // full name
    protected $appends = array('full_name');
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->father_name} {$this->grand_name} {$this->family_name}";
    }

    // departments
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
