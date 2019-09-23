<?php

namespace App\Http\Controllers;

use App\Localidad;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    
    public function index()
    {
       $Localidades = localidad::all($columns = ['id_localidad','nombre_localidad']);

       $data=[];
       return($Localidades);

       foreach ($Localidades as $key => $value ){
           $data[$key+1] =[
               'id' => $value->id_localidad,
               'text' => $value->nombre_localidad,
           ];
       };

       return response()->json($data);
    }

    
    public function store(Request $request)
    {
        
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
