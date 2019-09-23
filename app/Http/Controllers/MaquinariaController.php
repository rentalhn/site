<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maquinaria;
use Illuminate\Support\Facades\Log;

use function Psy\info;

class MaquinariaController extends Controller
{
    public function index($LocalMaquinaria)
    {   /*
        Log::debug($LocalMaquinaria);
        $MaquinariaCart =Maquinaria::whereIn('id_maquinaria',$LocalMaquinaria)->get();
        
        return response()->json([
            "MaquinariaCart"=> $MaquinariaCart
        ],200);
        */

    }

    public function getMaquinaria(Request $request){
            //$LocalMaquinaria = array_keys($request->all());
           $cart = json_decode(Request("data"));
            //$data = $request->all();           
            $MaquinariaCart = Maquinaria::select('maquinarias.id_maquinaria',
                                                 'maquinarias.Nombre_maquinaria',
                                                 'maquinarias.Precio_x_hora',
                                                 'imgmaquinarias.Descripcion_img_maquinaria')
                                          ->leftJoin('imgmaquinarias','maquinarias.id_maquinaria','=','imgmaquinarias.id_maquinaria')
                                          ->whereIn('maquinarias.id_maquinaria',$cart)
                                          
                                          ->get();
            return($MaquinariaCart);
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show($idLocalidad,$idTipomaquinaria)
    {
        $Maquinaria = Maquinaria::where([
                                        ['Id_Localidad','=',$idLocalidad],
                                        ['Id_tipo_maquinaria','=',$idTipomaquinaria]
                                        ])
                                 ->get();
        return response()->json([
            "Maquinaria" => $Maquinaria
        ],200);
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
