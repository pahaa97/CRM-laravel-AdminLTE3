<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ShowController extends Controller
{
    public function __invoke(Client $client)
    {
        $companies = $client->companies()->get();
        return view('client.show', compact('client', 'companies'));
    }
}
