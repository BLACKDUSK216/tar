<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UnreturnedItemsController extends Controller
{
    public function index()
    {
        $UnreturnedItems = DB::table('UnreturnedItems')->get();
        $employees = DB::table('Employee')->get();
        $inventoryItems = DB::table('Inventory')->get();

        return view('UnreturnedItems', compact('UnreturnedItems', 'employees', 'inventoryItems'));
    }

    public function addUnreturnedItems(Request $request)
    {
        $newEmployeeName = $request->input('new_EmployeeName');
        $newItemName = $request->input('new_ItemName');

        // Get Employee ID based on Employee Name
        $employee = DB::table('Employee')->where('EmployeeName', $newEmployeeName)->first();
        $newEmployeeID = $employee->EmployeeID;

        // Get Item ID based on Item Name
        $item = DB::table('Inventory')->where('ItemName', $newItemName)->first();
        $newItemID = $item->ItemID;

        DB::table('UnreturnedItems')->insert([
            'EmployeeID' => $newEmployeeID,
            'ItemID' => $newItemID,
            'EmployeeName' => $newEmployeeName,
            'ItemName' => $newItemName,
        ]);

        return redirect()->route('unreturneditems');
    }

    public function deleteUnreturnedItems($id)
    {
        // Log the ID to verify it's being received
        \Log::info('Deleting item with ID: ' . $id);
    
        DB::table('UnreturnedItems')
            ->where('id', $id)
            ->delete();
    
        return redirect()->route('unreturneditems')->with('success', 'Unreturned item deleted successfully.');
    }
    
    
}
