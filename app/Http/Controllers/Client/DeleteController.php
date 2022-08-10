<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Company;

class DeleteController extends Controller
{
    public function __invoke(Client $client)
    {
        $client->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
