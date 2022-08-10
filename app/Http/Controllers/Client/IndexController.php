<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Company;

class IndexController extends Controller
{
    public function __invoke()
    {
        $clients = Client::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);
        return view('client.index', compact('clients'));
    }
}
