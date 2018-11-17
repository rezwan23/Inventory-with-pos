<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', ['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'name'  =>  'required',
            'email' =>  '',
            'phone' =>  'required',
            'designation'   =>  'required',
            'nid'   =>  'required',
            'present_address'   =>  'required',
            'permanent_address'    =>  'required',
        ]);
        Employee::create($validatedData);
        return redirect()->route('employee.index')->with('success-message', 'Employee Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit', ['employee'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'name'  =>  'required',
            'email' =>  '',
            'phone' =>  'required',
            'designation'   =>  'required',
            'nid'   =>  'required',
            'present_address'   =>  'required',
            'permanent_address'    =>  'required',
        ]);
        $updatingRow = Employee::find($id);
        $updatingRow->update($validatedData);
        return redirect()->route('employee.index')->with('success-message', 'Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delRow = Employee::find($id);
        $delRow->delete();
        return redirect()->route('employee.index')->with('success-message', 'Employee Deleted Successfully');
    }
}
