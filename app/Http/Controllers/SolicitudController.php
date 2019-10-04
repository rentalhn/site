<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    
    public function index()
    {
        
    }
    public function create()
    {
        
    }

    public function store(Request $request)
    {   
        $Nombres = $request->input('Nombres');
        $Apellidos = $request->input('Apellidos');
        $Identidad = $request->input('Identidad');
        $Telefono = $request->input('Telefono');
        $Email = $request->input('Email');
        $Departamento = $request->input('Departamento');
        $Direccion = $request->input('Direccion');
        
        DB::insert('insert into personas(Identidad,
                                        Nombre,
                                        Apellidos,
                                        Telefono,
                                        Correo_Electronico,
                                        Direccion,
                                        id_Localidad,
                                        Estado)
                                        values(?,?,?,?,?,?,?,?)',
                                        [$Identidad,
                                         $Nombres,
                                         $Apellidos,
                                         $Telefono,
                                         $Email,
                                         $Direccion,                                         
                                         $Departamento,
                                         'ACTIVO']);

        echo('Se insertaron registros correctamentes');

    }
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
