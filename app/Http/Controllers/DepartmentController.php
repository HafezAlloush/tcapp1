<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // اعداد الفلترة حسب الاسم
        $departments = Department::where('name', 'like', '%' . $request->name . '%');
        
        // اعداد الفلترة حسب رقم الدائرة
        if (!empty($request->id)) {
            $departments = $departments->where('id', $request->id);
        }

        // جلب كل الاقسام بعد الفلترة
        $departments = $departments->get();
        
        // تنفيذ جملة الاستعلام
        if ($request->ajax()) {
            return response()->json($departments);
        }
        return view('departments.index', compact('departments'));
    }
    
    // public function deplist(Request $request)
    // {

    //     $departments = Department::where('name', 'like', '%' . $request->name . '%');
    //     if (!empty($request->id)) {
    //         $departments = $departments->where('id', $request->id);
    //     }
    //     $departments = $departments->get();
    //     // $departments = Department::get();
    //     if ($request->ajax()) {
    //         return response()->json($departments);
    //     }
    //     return view('departments.dep1', compact('departments'));
    // }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
