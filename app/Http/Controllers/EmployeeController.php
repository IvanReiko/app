<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\WorkHistory;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Employee::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return response()->json(
            ['employee' => $employee, 'active_machine' => $employee->machines()->whereNull('ended_at')->get()]
        );
    }

    public function getEmployeeHistory(Employee $employee, Request $request)
    {
        $employeeHistory = $employee->machines()->paginate($request->get('per_page', 10));

        return response()->json($employeeHistory);
    }

}
