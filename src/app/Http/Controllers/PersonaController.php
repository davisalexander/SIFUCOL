<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Faker\Factory as Faker;

class PersonaController extends Controller{

    private $maxrecords=16;

    public function seed(Request $request){
        $faker = Faker::create();

        if($request->wipe){
            DB::table('persona')->delete();
        }
        else {
            # code...
        }
        for($i=0; $i < $request->maxrecords; $i++){
            DB::table('persona')->insert([
                'cedula'=>$faker->randomNumber(9,true),
                'nombre'=>$faker->firstname,
                'apellidos'=>"{$faker->lastname} {$faker->lastname}",
                'ocupacion'=>$faker->jobTitle,
                'tels'=>$faker->tollFreephoneNumber,
                'direccion'=>$faker->address,
                'contactos'=>$faker->text(100)
            ]);
        }


        return $this->index();
    }

    public function index(){
        $result=DB::table('persona')->paginate($this->maxrecords);
        return response()->json([
            'personas'=>$result->items(),
            'last'=>$result->lastPage(),
            'total'=>$result->total()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {

         $persona=$request->persona;

         // Store new person
         $result = DB::table('persona')
         ->insert([
             'cedula'=>$persona['cedula'],
             'nombre'=>$persona['nombre'],
             'apellidos'=>$persona['apellidos'],
             'ocupacion'=>$persona['ocupacion'],
             'tels'=>$persona['tels'],
             'direccion'=>$persona['direccion'],
             'contactos'=>$persona['contacto']
         ]);

         // Store new record into person if withrecord flag is enabled (true)
         if($result && $persona['withrecord']){
             $expediente=$request->expediente;
             return response()->json([
                 'success'=>DB::table('expedientes')
                 ->insert([
                     'persona'=>$persona['cedula'],
                     'ayuda'=>$expediente['ayuda'],
                     'prioridad'=>$expediente['prioridad'],
                     'monto'=>$expediente['monto'],
                     'monto'=>$expediente['descripcion'],
                     'recomendaciones'=>$expediente['recomendaciones']
                     //'fecha_creacion'=>$request->contactos
                 ])
             ]);
         }

         return response()->json(['success'=>$result]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json([
            'result'=>DB::table('persona')
                ->where('cedula', $request->cedula)
                ->update([
                    'nombre'=>$request->nombre,
                    'apellidos'=>$request->apellidos,
                    'ocupacion'=>$request->ocupacion,
                    'tels'=>$request->tels
                ])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=DB::table('persona')->where('cedula', '=', $id)->delete();
        $last=DB::table('persona')->paginate($this->maxrecords)->lastPage();

        return response()->json([
            'result'=>$result,
            'last'=>$last
        ]);
    }
}
