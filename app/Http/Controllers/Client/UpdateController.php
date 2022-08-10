<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\UpdateRequest;
use App\Models\Client;
use App\Models\Company;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Client $client)
    {
        $data = $request->validated();
        $client->update($data);
        $client->companies()->sync(Company::find($request->companies));
        $companies = $client->companies()->get();
        return redirect()->route('client.show', compact('client','companies'));
    }
}
