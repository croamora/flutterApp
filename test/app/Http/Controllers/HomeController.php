<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use App\Capitulo;
use App\Versiculo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function biblia()
    {
        $jsonString = file_get_contents(storage_path() . "/json/jsonformatter.txt");
        $data = json_decode($jsonString,true);
        if (is_array($data) || is_object($data)){
            $numeroorden = 0;
            foreach ($data as $item) {     
                $numeroorden ++; 
                $libro = new Libro;
                $libro->abreviacion = $item['abbrev'];
                $libro->nombre_libro = $item['name'];
                $libro->orden = $numeroorden;
                $libro->save();
                $numeroCapitulo = 0;
                
                foreach ($item['chapters'] as $capitulo) {  
                    $numeroCapitulo ++;
                    $capituloGenerado = new Capitulo;
                    $capituloGenerado->numero = $numeroCapitulo;
                    $capituloGenerado->id_libro = $libro->id;
                    $capituloGenerado->save();
                    $numeroVersiculo = 0;
                    foreach ($capitulo as $versiculo) {  
                        $numeroVersiculo ++;
                        $versiculoGenerado = new Versiculo;
                        $versiculoGenerado->numero = $numeroVersiculo;
                        $versiculoGenerado->versiculo = $versiculo;
                        $versiculoGenerado->id_capitulo = $capituloGenerado->id;
                        $versiculoGenerado->save();
                    }
                }
            }
        }
        

        //return view('biblia');
    }

}
