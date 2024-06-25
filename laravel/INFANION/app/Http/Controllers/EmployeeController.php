<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $Employee = DB::table('Employee')->get();

        return view('Employee', ['Employee' => $Employee]);
    }
    public function addEmployee(Request $request)
    {
        $newId = $request->input('new_EmployeeId');
        $newName = $request->input('new_EmployeeName');
        $newDepartment = $request->input('new_Department');
        $newPosition = $request->input('new_Position');

        DB::table('Employee')->insert([
            'EmployeeID' => $newId,
            'EmployeeName' => $newName,
            'Department' => $newDepartment,
            'Position' => $newPosition,
        ]);

        return redirect()->route('employee');
    }

    public function editEmployee(Request $request)
    {
        $EmployeeIdToUpdate = $request->input('edit_EmployeeId');
        $updatedEmployeeName = $request->input('edit_EmployeeName');
        $updatedDepartment = $request->input('edit_Department');
        $updatedPosition = $request->input('edit_Position');

        DB::table('Employee')->where('EmployeeID', $EmployeeIdToUpdate)->update([
            'EmployeeName' => $updatedEmployeeName,
            'Department' => $updatedDepartment,
            'Position' => $updatedPosition,
        ]);

        return redirect()->route('employee');
    }
    public function getEmployeeDetails($id)
    {
        $Employee = DB::table('Employee')->where('EmployeeID', $id)->first();
    
        return response()->json($Employee);
    }
    
    public function deleteEmployee($id)
    {
        DB::table('Employee')
            ->where('EmployeeID', $id)
            ->delete();

        return redirect()->route('employee')->with('success', 'Company deleted successfully.');
    }
}


