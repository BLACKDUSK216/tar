<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    public function index()
    {
        $companyInfo = DB::table('CompanyInfo')->get();

        return view('companyinfo', ['companyInfo' => $companyInfo]);
    }

    public function addCompany(Request $request)
    {
        $newId = $request->input('new_CompanyId');
        $newName = $request->input('new_CompanyName');
        $newLocation = $request->input('new_Location');
        $newIndustryType = $request->input('new_IndustryType');

        DB::table('CompanyInfo')->insert([
            'CompanyID' => $newId,
            'CompanyName' => $newName,
            'Location' => $newLocation,
            'IndustryType' => $newIndustryType,
        ]);

        return redirect()->route('company.info');
    }

    public function editCompany(Request $request)
    {
        $companyIdToUpdate = $request->input('edit_CompanyId');
        $updatedCompanyName = $request->input('edit_CompanyName');
        $updatedLocation = $request->input('edit_Location');
        $updatedIndustryType = $request->input('edit_IndustryType');

        DB::table('CompanyInfo')->where('CompanyID', $companyIdToUpdate)->update([
            'CompanyName' => $updatedCompanyName,
            'Location' => $updatedLocation,
            'IndustryType' => $updatedIndustryType,
        ]);

        return redirect()->route('company.info');
    }
    public function getCompanyDetails($id)
    {
        $company = DB::table('CompanyInfo')->where('CompanyID', $id)->first();
    
        return response()->json($company);
    }
    
    public function deleteCompany($id)
    {
        DB::table('CompanyInfo')
            ->where('CompanyID', $id)
            ->delete();

        return redirect()->route('company.info')->with('success', 'Company deleted successfully.');
    }
}
