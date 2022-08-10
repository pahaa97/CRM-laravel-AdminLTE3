<?php

namespace App\Http\Controllers;



use App\Models\Client;
use App\Models\Company;

class IndexController extends Controller
{
    public function __invoke()
    {
        $companies = Company::where('user_id', auth()->user()->id)->count();
        $clients = Client::where('user_id', auth()->user()->id)->count();
        return view('home', compact('clients', 'companies'));
    }
}
