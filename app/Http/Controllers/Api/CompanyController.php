<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function getCompanies()
    {
        return response()->json(['response' => Company::where('user_id', auth()->user()->id)->paginate(10)], 200);
    }

    public function getClients(Company $company)
    {
        return response()->json(['response' => $company->clients()->paginate(10)], 200);
    }
}
