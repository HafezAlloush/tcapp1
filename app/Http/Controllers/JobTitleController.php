<?php

namespace App\Http\Controllers;

use App\Models\Job_title;
use App\Http\Requests\StoreJob_titleRequest;
use App\Http\Requests\UpdateJob_titleRequest;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreJob_titleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJob_titleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job_title  $job_title
     * @return \Illuminate\Http\Response
     */
    public function show(Job_title $job_title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job_title  $job_title
     * @return \Illuminate\Http\Response
     */
    public function edit(Job_title $job_title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJob_titleRequest  $request
     * @param  \App\Models\Job_title  $job_title
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJob_titleRequest $request, Job_title $job_title)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job_title  $job_title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job_title $job_title)
    {
        //
    }
}
