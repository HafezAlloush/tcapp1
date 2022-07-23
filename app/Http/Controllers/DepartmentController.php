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
    public function store(Request $request)
    {
        $newDepartment = new Department;
        $newDepartment->name = $request->name;
        $newDepartment->save();
        return ($request);
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
    public function update(UpdateDepartmentRequest $request, $id)
    {
        $department = Department::find($id);
        $department->name = $request ->name;
        $department->save();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        if ($department) {
            $department->delete();
            $department->save;
            return ('department deleted successfully');
        }
        return ('department not exists');
    }
}
