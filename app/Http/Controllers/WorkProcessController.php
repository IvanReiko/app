<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Machine;
use App\Models\WorkHistory;

class WorkProcessController extends Controller
{
    public function assign(Employee $employee,Machine $machine)
    {
        if ($machine->employees()->whereNull('ended_at')->first()) {
            return response()->json(['message' => 'This machine is busy'], 400);
        }

        WorkHistory::create([
            'employee_id' => $employee->id,
            'machine_id' => $machine->id,
            'started_at' => now(),
            'created_at' => now(),
        ]);

        return response()->json(['message' => 'Employee successfully assign'], 200);
    }


    public function unassign(Employee $employee,Machine $machine)
    {
        $assignment = WorkHistory::where('machine_id', $machine->id)
            ->where('employee_id', $employee->id)
            ->whereNull('ended_at')
            ->first();

        if (!$assignment) {
            return response()->json(['message' => "Employee don't work with this machine"], 400);
        }

        $assignment->update(['ended_at' => now(), 'updated_at' => now()]);

        return response()->json(['message' => 'Employee unassigned from machine'], 200);
    }
}
