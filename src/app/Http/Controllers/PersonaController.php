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
        $personas=$result->items();

        for ($i = 0, $length = count($personas); $i < $length; $i++) {
            $personas[$i] = (array)$personas[$i];
            $personas[$i]['expedientes'] = DB::table('expedientes')->where('persona', $personas[$i]['cedula'])->get();
        }

        return response()->json([
            'personas'=>$personas,
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

         return response()->json([
             'personsuccess'=>DB::table('persona')
             ->insert([
                 'cedula'=>$persona['cedula'],
                 'nombre'=>$persona['nombre'],
                 'apellidos'=>$persona['apellidos'],
                 'ocupacion'=>$persona['ocupacion'],
                 'tels'=>$persona['tels'],
                 'direccion'=>$persona['direccion'],
                 'contactos'=>$persona['contacto']
             ])
         ]);

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

    public function records($id){}
}
