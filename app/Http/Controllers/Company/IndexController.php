<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class IndexController extends Controller
{
    public function __invoke()
    {
        $companies = Company::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);
        return view('company.index', compact('companies'));
    }
}
