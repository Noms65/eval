<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function index()
    {
        return view('login');
    }

    public function Acceuil()
    {
        return view('index');
    }

    public function redirect_login()
    {
        return view('auth/login');
    }

    public function registerSave(Request $request)
    {
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $password = $request->input('password');

        $service = new Service();
        $data = $service->verifier_Users($nom, $prenom);
        if (empty($data)) {
            $service->create_Users($nom, $prenom, $password);
            $users = new User();
            $session = session();
            $userList = $users->getUser($nom, $password);
            $session->put('idp', $userList[0]->idusers);
            // $id = $session->get('idp');
            // echo $id;
            $service = new Service();
            $list_typeBillet = $service->getType_Billet();
            $list_billet_one = $service->getBillet();
            $list_categorie = $service->getCategorie_film();

            return view('service_billet/achat_Billet', ['list_categorie' => $list_categorie, 'type_billet' => $list_typeBillet], ['list_billet_one' => $list_billet_one]);

        } else {
            $message = "users deja exist !";
            return redirect()->route('register', ['message' => $message]);
        }
    }

    public function loginAction(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        $users = new User();
        if ($name != null && $password != null) {

            $userList = $users->getUser($name, $password);
            if ($userList != null) {
                $session = session();

                $session->put('idp', $userList[0]->idusers);
                $id = $session->get('idp');
                // echo $id;
                $service = new Service();
                $list_typeBillet = $service->getType_Billet();
                $list_billet_one = $service->getBillet();
                $list_categorie = $service->getCategorie_film();

                return view('service_billet/achat_Billet', ['list_categorie' => $list_categorie, 'type_billet' => $list_typeBillet], ['list_billet_one' => $list_billet_one]);
            } else {
                $message = "erreur authentification";
                return redirect()->route('connexion', ['message' => $message]);
            }

        } else {
            return view('auth/login');
        }

        // $request->session()->regenerate();
        // return redirect()->route('Acceuil.action');
    }

    public function Deconnexion()
    {
        // $request->session()->flush();
        $session = session();
        $session->flush();
        return view('auth/login');
    }

    // public function logout(Request $request){
    //     Auth::guard('web')->logout();
    //     $request->session()->invalidate();
    //     return redirect('auth/login');
    // }
}
