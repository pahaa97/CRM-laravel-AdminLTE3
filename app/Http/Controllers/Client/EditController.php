<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Company;

class EditController extends Controller
{
    public function __invoke(Client $client)
    {
        $companies = Company::where('user_id', auth()->user()->id)->get()->take(10);
        return view('client.edit', compact('client', 'companies'));
    }
}
