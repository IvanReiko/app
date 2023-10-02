<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Machine::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Machine $machine)
    {
        return response()->json(
            ['machine' => $machine, 'assigned_employee' => $machine->employees()->whereNull('ended_at')->first()]
        );
    }

    public function getMachineHistory(Machine $machine, Request $request)
    {
        $machineHistory = $machine->employees()->paginate($request->get('per_page', 10));

        return response()->json($machineHistory);
    }

}
