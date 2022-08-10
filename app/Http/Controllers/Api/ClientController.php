<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public function clientCompanies(Client $client)
    {
        return response()->json(['response' => $client->companies()->paginate(10)], 200);
    }
}
