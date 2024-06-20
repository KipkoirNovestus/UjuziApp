<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;

class ClientController extends Controller
{
    protected $client;
    public function __construct(){
        $this->client = new client();
        
    }

    public function index()
    {
        return $this->client->all();
     
    }

    public function store(Request $request)
    {
     return $this->client->create($request->all());
    
       
    }

    public function show(string $id)
    {
    return $client = $this->client->find($id);  
    }

    public function update(Request $request, string $id)
    {
         $client = $this->client->find($id);
 		$client->update($request->all());
         return $client;
    }

    public function destroy(string $id)
    {
     $client = $this->client->find($id);
    return $client->delete();   
    }





}
