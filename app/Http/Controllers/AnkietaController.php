<?php

namespace App\Http\Controllers;

use App\Models\Ankieta;
use App\Models\Profesor;
use App\Models\Przedmiot;
use App\Models\Pytania;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnkietaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$przedmiots = DB::select('select * from przedmiots');
        $przedmiot = Przedmiot::all();
        $pytania = Pytania::all();
        $stala = 0;
        $ankieta = array();
        $current_user =  auth()->user()->id;

        $current_profesor_arr = DB::select('select id from profesors where user_id=:current_user',['current_user' => $current_user]);
        foreach ($current_profesor_arr as $current_profesor){
             $ankieta = DB::select('select  przedmiot_id, pytania_id, avg(ocena) as ocena from ankietas where profesor_id =:current_profesor group by przedmiot_id, pytania_id', ['current_profesor' => $current_profesor->id]);
        }

//        foreach ($przedmiots as $przedmiot){
//            $current_przedmiot_id = $przedmiot->id;
//            foreach ($ankieta as $ankieta_item){
//                if ($current_przedmiot_id == $ankieta_item->przedmiot_id){
//
//                }
//            }
//        }
//        foreach ($ankieta as $srednia){
//            $stala += $srednia->ocena;
//        }
//        $sumaOcen = count($ankieta);
//        $glownaOcena = $stala/$sumaOcen;


        return view('ankieta.index')->with(array(
            'ankietas' => $ankieta,
            'przedmiots' => $przedmiot,
            'pytanias' => $pytania,
        ));
//        return ();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesor = Profesor::all();
        $przedmiot = Przedmiot::all();
        $pytania = Pytania::all();
        return view('ankieta.create')->with(array(
            'profesors' => $profesor,
            'przedmiots' => $przedmiot,
            'pytanias' => $pytania
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_user =  auth()->user()->id;
        $data = $request->all();
        $ocena_arr = $data['odp'];
        foreach ($ocena_arr as $pytanie=>$ocena){
            var_dump($pytanie);
            $ankieta = Ankieta::create([
                'profesor_id' => $data['sel1'],
                'student_id'=> $current_user,
                'pytania_id' => $pytanie,
                'przedmiot_id' => $data['sel2'],
                'ocena' => $ocena
            ]);
        }
//
        return redirect()->route('home');
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
