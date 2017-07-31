<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RecordsController extends Controller{

    public function seed(){}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $expediente = $request->expediente;

         return response()->json([
             'recordsuccess'=>DB::table('expedientes')
             ->insert([
                 'persona'=>$request->persona['cedula'],
                 'ayuda'=>$expediente['ayuda'],
                 'prioridad'=>$expediente['prioridad'],
                 'monto'=>$expediente['monto'],
                 'descripcion'=>$expediente['descripcion'],
                 'recomendaciones'=>$expediente['recomendaciones']
                 //'fecha_creacion'=>$request->contactos
             ])
         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
