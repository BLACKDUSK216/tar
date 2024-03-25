<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $Inventory = DB::table('Inventory')->get();

        return view('Inventory', ['Inventory' => $Inventory]);
    }

    public function addItem(Request $request)
    {
        $itemId = $request->input('new_ItemID');
        $itemName = $request->input('new_ItemName');
        $quantityAvailable = $request->input('new_QuantityAvailable');
        $unitPrice = $request->input('new_UnitPrice');

        DB::table('Inventory')->insert([
            'ItemID' => $itemId,
            'ItemName' => $itemName,
            'QuantityAvailable' => $quantityAvailable,
            'UnitPrice' => $unitPrice,
        ]);

        return redirect()->route('inventory')->with('success', 'Item added successfully.');
    }

    public function editItem(Request $request)
    {
        $itemId = $request->input('edit_item_id');
        $itemName = $request->input('edit_item_name');
        $quantityAvailable = $request->input('edit_quantity_available');
        $unitPrice = $request->input('edit_unit_price');
    
        DB::table('Inventory')->where('ItemID', $itemId)->update([
            'ItemName' => $itemName,
            'QuantityAvailable' => $quantityAvailable,
            'UnitPrice' => $unitPrice,
        ]);
    
        return redirect()->route('inventory')->with('success', 'Item updated successfully.');
    }
    
    
    
    public function getItemDetails($id)
    {
        $item = DB::table('Inventory')->where('ItemID', $id)->first();
    
        return response()->json($item);
    }
    
    public function deleteItem($id)
    {
        DB::table('Inventory')->where('ItemID', $id)->delete();

        return redirect()->route('inventory')->with('success', 'Item deleted successfully.');
    }
}
