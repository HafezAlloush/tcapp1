<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class Trainee extends Model
{
    use HasFactory;
    protected $fillable = [
        'PID',
        'first_name',
        'father_name',
        'grand_name',
        'full_name',
        'family_name',
        'city',
        'birth_date',
        'street',
        'mobile1',
        'mobile2',
        'department_id'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // public function getFullNameAttribute(){
    //     return "{$this->first_name} {$this->father_name} {$this->grand_name} {$this->family_name}";
    // }
    ############## Start Department Name #######################
    public function getDepartmentIdAttribute($value)
    {
        $department = Department::find($value);
        return  $department->name;
    }

    public function setDepartmentIdAttribute($value)
    {
        $id = Department::where('name', $value);
        $this->Attributes['department_id'] = $id;
    }
    ############## End Department Name #######################

}
