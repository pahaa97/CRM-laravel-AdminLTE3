<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreRequest;
use App\Models\Client;
use App\Models\Company;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $client = Client::firstOrCreate($data);
        $client->companies()->attach(Company::find($request->companies));
        return redirect()->route('client.index');
    }
}
