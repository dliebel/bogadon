<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Exception;
use Illuminate\Support\Facades\Redirect;
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
        
        try {
            $input =$request->all();

            Client::create($input);
    
    
            return Redirect::route('cliente.index')->with('success','Se ha creado un nuevo cliente');
    
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                    'error'=>'Sucedio un error en el servidor' .$e->getMessage()
            ]);
        }



    

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


          
        try {


            $client= Client::find($id);
        
            $input =$request->all();
    
            $client->first_name= $input['first_name'];
            $client->last_name= $input['last_name'];
            $client->address= $input['address'];
            $client->phone= $input['phone'];
    
            $client->save();
    
    
    
            return Redirect::route('cliente.index')->with('success','Se ha editado correctamente el cliente');
    
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                    'error'=>'Sucedio un error en el servidor' .$e->getMessage()
            ]);
        }



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
