<?php

namespace App\Http\Controllers;

use App\Models\Generalisation;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function stat(){
        return view('diffusion/statistiques');
    }
    public function statistique(){
        return view('chart');
    }

    public function tableau(){
        return view('table');
    }

    public function formulaire(){
        return view('form');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function acceuille(){
        return view('index');
    }

    public function tabpanel(){
        return view('tabpanel');
    }

    public function uielements(){
        return view('uielements');
    }

    public function empty(){
        return view('empty');
    }

    public function language(Request $request){
        $idlangue = $request->input('id_language');
        $function = new Generalisation();
        $list_langue = $function->select("langue",["*"]);
        $phrase = $function->select("contenu",["contenu"],["id_langue"=>$idlangue]);
        return view('csv',['list_langue'=>$list_langue],['phrase'=>$phrase]);
    }

    public function Importcsv(){
        $message = '';
        $function = new Generalisation();
        $list_langue = $function->select("langue",["*"]);
        $phrase = $function->select("contenu",["contenu"],["id_langue"=>1]);
        if(session('message')){
            $message=session('message');
        }
        return view('csv',['message'=>$message,'list_langue'=>$list_langue],['phrase'=>$phrase]);
    }
    public function patient(){
        return view('patient/table_patient');
    }

}
