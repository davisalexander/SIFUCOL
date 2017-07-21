<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PersonaController extends ModelController
{

    public function index(){
        return response()->json(['personas'=>DB::table('persona')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return response()->json([
            'result'=>DB::table('persona')->insert([
                'cedula'=>$request->cedula,
                'nombre'=>$request->nombre,
                'apellidos'=>$request->apellidos,
                'ocupacion'=>$request->ocupacion,
                'tels'=>$request->tels,
                'direccion'=>$request->direccion,
                'contactos'=>$request->contactos
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
        return response()->json([
            'result'=>DB::table('persona')->where('cedula', '=', $id)->delete()
        ]);
    }
}