<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    public function index()
    {
        $Vendors = DB::table('Vendors')->get();

        return view('Vendors', ['Vendors' => $Vendors]);
    }
    public function addVendor(Request $request)
    {
        $newId = $request->input('new_VendorId');
        $newName = $request->input('new_VendorName');
        $newContactPerson = $request->input('new_ContactPerson');
        $newContactNumber = $request->input('new_ContactNumber');

        DB::table('Vendors')->insert([
            'VendorID' => $newId,
            'VendorName' => $newName,
            'ContactPerson' => $newContactPerson,
            'ContactNumber' => $newContactNumber,
        ]);

        return redirect()->route('vendors');
    }

    public function editVendor(Request $request)
    {
        $VendorIdToUpdate = $request->input('edit_VendorId');
        $updatedVendorName = $request->input('edit_VendorName');
        $updatedContactPerson = $request->input('edit_ContactPerson');
        $updatedContactNumber = $request->input('edit_ContactNumber');

        DB::table('Vendors')->where('VendorID', $VendorIdToUpdate)->update([
            'VendorName' => $updatedVendorName,
            'ContactPerson' => $updatedContactPerson,
            'ContactNumber' => $updatedContactNumber,
        ]);

        return redirect()->route('vendors');
    }
    public function getVendorDetails($id)
    {
        $Vendor = DB::table('Vendors')->where('VendorID', $id)->first();
    
        return response()->json($Vendor);
    }
    
    public function deleteVendor($id)
    {
        DB::table('Vendors')
            ->where('VendorID', $id)
            ->delete();

        return redirect()->route('vendors')->with('success', 'vendor deleted successfully.');
    }
}


