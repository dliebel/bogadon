<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Inertia\Inertia;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients= Client::all();


        return Inertia::render(
            'Client/Index',
            [
                'clients'=>$clients
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'Client/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        
        $input =$request->all();

        Client::create($input);

        return redirect()->route('cliente.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $client= Client::find($id);

        return Inertia::render(
            'Client/Edit',
            [
                'client'=>$client
            ]
        );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, $id)
    {

        $client= Client::find($id);
        
        $input =$request->all();

        $client->firsh_name= $input['firsh_name'];
        $client->last_name= $input['last_name'];
        $client->address= $input['address'];
        $client->phone= $input['phone'];

        $client->save();

        return redirect()->route('cliente.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client= Client::find($id);

        $client->delete();
    }
}
