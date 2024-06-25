<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeInventoryController extends Controller
{
    public function index()
    {
        $EmployeeInventory = DB::table('EmployeeInventory')->get();
        $employees = DB::table('Employee')->get();
        $inventoryItems = DB::table('Inventory')->get();
    
        return view('EmployeeInventory', compact('EmployeeInventory', 'employees', 'inventoryItems'));
    }
    

    public function addEmployeeInventory(Request $request)
    {
        $employees = DB::table('Employee')->get();
        $inventoryItems = DB::table('Inventory')->get();

        $newEmployeeName = $request->input('newEmployeeName');
        $newItemName = $request->input('newItemName');
        $newReceivedDate = $request->input('new_ReceivedDate');
        $newReturnDate = $request->input('new_ReturnDate');

$newReturnDate = $request->input('new_ReturnDate');
if ($request->has('didNotReturn')) {
    $newReturnDate = null;
}


        DB::table('EmployeeInventory')->insert([    
            'EmployeeName' => $newEmployeeName,
            'ItemName' => $newItemName,
            'ReceivedDate' => $newReceivedDate,
            'ReturnDate' => $newReturnDate,
        ]);

        return redirect()->route('employeeinventory');
    }

    public function deleteEmployeeInventory($id)
    {
        $employeeInventory = DB::table('EmployeeInventory')
            ->where('id', $id)
            ->first();
    
        if ($employeeInventory->ReturnDate === null) {
            DB::table('UnreturnedItems')
                ->where('EmployeeName', $employeeInventory->EmployeeName)
                ->where('ItemName', $employeeInventory->ItemName)
                ->delete();
        }
    
        DB::table('EmployeeInventory')
            ->where('id', $id)
            ->delete();
    
        return redirect()->route('employeeinventory')->with('success', 'Employee Inventory deleted successfully.');
    }
    
}
