<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\caregiver;



class CaregiverController extends Controller
{
    protected $caregiver;
    public function __construct(){
        $this->caregiver = new caregiver();
        
    }
    public function index()
    {
        return $this->caregiver->all();
     
    }
    public function store(Request $request)
    {
     return $this->caregiver->create($request->all());
    
       
    }
    public function show(string $id)
    {
    return $caregiver = $this->caregiver->find($id);  
    }

    public function update(Request $request, string $id)
    {
         $caregiver = $this->caregiver->find($id);
 		$caregiver->update($request->all());
         return $caregiver;
    }


    public function destroy(string $id)
    {
     $caregiver = $this->caregiver->find($id);
    return $caregiver->delete();   
    }



}