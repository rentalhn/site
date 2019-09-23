<?php

namespace App\Http\Controllers;

use App\TipoMaquinaria;
use Illuminate\Http\Request;

class TipoMaquinariaController extends Controller
{
    
    public function index()
    {
    
     

        //$data=[];
        //return($TipoMaquinaria);
/* 
        foreach ($TipoMaquinaria as $key => $value ){
            $data[$key+1] =[
                'id' => $value->id_tipo_maquinaria,
                'text' => $value->tipo_maquinaria,
            ];
        };
 
        return response()->json($data);
        */
    }

    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
        
    }


    public function show($id_localidad)
    {
        $TipoMaquinaria = TipoMaquinaria::where('Id_Localidad',$id_localidad)->get();

        if(!is_Null($TipoMaquinaria)){
            
            return $TipoMaquinaria;
                
        }else{
            return 'Gay Ramon';
        }
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
