<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CreateController extends Controller
{
    public function __invoke()
    {
        $companies = Company::where('user_id', auth()->user()->id)->get()->take(10);
        return view('client.create', compact('companies'));
    }
}
