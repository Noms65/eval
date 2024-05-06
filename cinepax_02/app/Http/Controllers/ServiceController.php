<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Http\Request;
use App\Models\Generalisation;
use Illuminate\Support\Facades\DB;
use league\csv\src\Reader;
// use League\Csv\Reader;
// use SplFileObject;
use Illuminate\Routing\Controller as BaseController;

class ServiceController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    // Controller
    public function update_Valid_seance(Request $request)
    {
        $numero_page = $request->input('page') ?? 1;

        $service = new Service();
        $idseance = $request->input('idseance');
        $numseance = $request->input('numseance');
        $nom_salle = $request->input('nom_salle');
        $nom_film = $request->input('nom_film');
        $dates = $request->input('dates');
        $heure = $request->input('heure');

        $idsalle = $service->getId_SalleByNom($nom_salle);
        $idfilm = $service->getId_FilmByNom($nom_film);


        if (empty($idfilm) || empty($idsalle) || empty($idseance) || empty($numseance) || empty($dates) || empty($heure)) {
            $nombre_afficher = 5;
            $data = DB::select("select * from v_getseance limit ? OFFSET (?-1) * ?", [$nombre_afficher, $numero_page, $nombre_afficher]);
            $film = $service->getAll_Film();
            $salle = $service->getAll_Salle();
            $categorie = $service->getAll_Categorie_Film();

            // echo $idfilm.$idsalle.$idseance.$numseance.$dates.$heure;

            return view('diffusion/update_seance/update_seance', ["list_categorie" => $categorie, "list_salle" => $salle, "list_film" => $film, "list_seance" => $data, "currentPage" => $numero_page, "totalPages" => $nombre_afficher]);

        } else {
            $service->update_seance($idseance, $numseance, $idsalle, $idfilm, $dates, $heure);
            $nombre_afficher = 5;
            $data = DB::select("select * from v_getseance limit ? OFFSET (?-1) * ?", [$nombre_afficher, $numero_page, $nombre_afficher]);
            $film = $service->getAll_Film();
            $salle = $service->getAll_Salle();
            $categorie = $service->getAll_Categorie_Film();

            return view('diffusion/update_seance/update_seance', ["list_categorie" => $categorie, "list_salle" => $salle, "list_film" => $film, "list_seance" => $data, "currentPage" => $numero_page, "totalPages" => $nombre_afficher]);
        }
    }
    public function update_seance(Request $request)
    {
        $service = new Service();
        $numero_page = $request->input('page') ?? 1;
        $nombre_afficher = 5;
        $data = DB::select("
        select * from v_getseance limit ? OFFSET (?-1) * ?", [$nombre_afficher, $numero_page, $nombre_afficher]);

        $film = $service->getAll_Film();
        $salle = $service->getAll_Salle();
        $categorie = $service->getAll_Categorie_Film();

        return view('diffusion/update_seance/update_seance', ["list_categorie" => $categorie, "list_salle" => $salle, "list_film" => $film, "list_seance" => $data, "currentPage" => $numero_page, "totalPages" => $nombre_afficher]);
    }
    public function pagination_seance(Request $request)
    {
        $service = new Service();
        $message = '';
        $numero_page = $request->input('page') ?? 1;
        $nombre_afficher = 5;
        $data = DB::select("select * from v_getseance limit ? OFFSET (?-1) * ?", [$nombre_afficher, $numero_page, $nombre_afficher]);
        if(session('message')){
            $message=session('message');
        }
        $liste_categorie = $service->getCategorie_film();

        return view('diffusion/liste_seance', ["liste_categorie"=>$liste_categorie,"message"=>$message,"list_seance" => $data, "currentPage" => $numero_page, "totalPages" => $nombre_afficher]);
    }
    public function stat()
    {
        $service = new Service();
        $data_vente = $service->getStat_venteBillet();

        $nouvellesLabels = ['Adulte', 'Enfant','Produit'];
        $nouvellesDonnees = [15, 10,12];
        $nouvellesCouleurs = ['red', 'blue','green'];

        return view('diffusion/statistiques', ['vente'=>$data_vente,'labels' => $nouvellesLabels, 'donnees' => $nouvellesDonnees, 'couleurs' => $nouvellesCouleurs]);
    }
    public function filtre_Liste_Seance(Request $request)
    {
        $categorie = $request->input('categorie');
        $service = new Service();
        $message = '';
        $numero_page = $request->input('page') ?? 1;
        $nombre_afficher = 5;
        $data = DB::select("select * from v_getseance where categorie_film = ? limit ? OFFSET (?-1) * ?", [$categorie,$nombre_afficher, $numero_page, $nombre_afficher]);
        if(session('message')){
            $message=session('message');
        }
        $liste_categorie = $service->getCategorie_film();

        return view('diffusion/liste_seance', ["liste_categorie"=>$liste_categorie,"message"=>$message,"list_seance" => $data, "currentPage" => $numero_page, "totalPages" => $nombre_afficher]);
    }

    public function delete_Valid_seance(Request $request)
    {
        $idseance = $request->input('idseance_delete');
        $service = new Service();
        $service->remove_Seance($idseance);

        $numero_page = $request->input('page') ?? 1;
        $nombre_afficher = 5;
        $data = DB::select("
        select * from v_getseance limit ? OFFSET (?-1) * ?", [$nombre_afficher, $numero_page, $nombre_afficher]);

        $film = $service->getAll_Film();
        $salle = $service->getAll_Salle();
        $categorie = $service->getAll_Categorie_Film();

        return view('diffusion/update_seance/update_seance', ["list_categorie" => $categorie, "list_salle" => $salle, "list_film" => $film, "list_seance" => $data, "currentPage" => $numero_page, "totalPages" => $nombre_afficher]);

    }
    public function Ajout_seance(Request $request)
    {
        $service = new Service();
        $numero = $request->input('numero');
        $idsalle = $request->input('idsalle');
        $idfilm = $request->input('idfilm');
        $dates = $request->input('dates');
        $heure = $request->input('heure');

        // echo $numero."salle : ".$idsalle."film : ".$idfilm."date : ".$dates.$heure;
        // $data_verifier = $service->verifier_Seance($numero, $idsalle, $idfilm, $dates, $heure);
        // echo "data". $data_verifier;

        if (empty($numero) || empty($idsalle) || empty($idfilm) || empty($dates) || empty($heure)) {
            $numero_page = $request->input('page') ?? 1;
            $nombre_afficher = 5;
            $data = DB::select("select * from v_getseance limit ? OFFSET (?-1) * ?", [$nombre_afficher, $numero_page, $nombre_afficher]);

            $film = $service->getAll_Film();
            $salle = $service->getAll_Salle();
            $categorie = $service->getAll_Categorie_Film();

            return view('diffusion/update_seance/update_seance', ["list_categorie" => $categorie, "list_salle" => $salle, "list_film" => $film, "list_seance" => $data, "currentPage" => $numero_page, "totalPages" => $nombre_afficher]);
        } else {
            if (is_integer($numero) == false) {
                $numero_page = $request->input('page') ?? 1;
                $nombre_afficher = 5;
                $data = DB::select("select * from v_getseance limit ? OFFSET (?-1) * ?", [$nombre_afficher, $numero_page, $nombre_afficher]);

                $film = $service->getAll_Film();
                $salle = $service->getAll_Salle();
                $categorie = $service->getAll_Categorie_Film();
                $message = "type numero non garder!";

                return view('diffusion/update_seance/update_seance', ["message" => $message, "list_categorie" => $categorie, "list_salle" => $salle, "list_film" => $film, "list_seance" => $data, "currentPage" => $numero_page, "totalPages" => $nombre_afficher]);
            } else {
                $data_verifier = $service->verifier_Seance($numero, $idsalle, $idfilm, $dates, $heure);
                // echo $data_verifier;

                if ($data_verifier == 1) {
                    $service->ajout_seance($numero, $idsalle, $idfilm, $dates, $heure);

                    $numero_page = $request->input('page') ?? 1;
                    $nombre_afficher = 5;
                    $data = DB::select("select * from v_getseance limit ? OFFSET (?-1) * ?", [$nombre_afficher, $numero_page, $nombre_afficher]);
                    $film = $service->getAll_Film();
                    $salle = $service->getAll_Salle();
                    $categorie = $service->getAll_Categorie_Film();

                    return view('diffusion/update_seance/update_seance', ["list_categorie" => $categorie, "list_salle" => $salle, "list_film" => $film, "list_seance" => $data, "currentPage" => $numero_page, "totalPages" => $nombre_afficher]);
                } else {
                    $numero_page = $request->input('page') ?? 1;
                    $nombre_afficher = 5;
                    $data = DB::select("select * from v_getseance limit ? OFFSET (?-1) * ?", [$nombre_afficher, $numero_page, $nombre_afficher]);
                    $message = "seance deja existe !";
                    echo $message;

                    $film = $service->getAll_Film();
                    $salle = $service->getAll_Salle();
                    $categorie = $service->getAll_Categorie_Film();

                    return view('diffusion/update_seance/update_seance', ["message" => $message, "list_categorie" => $categorie, "list_salle" => $salle, "list_film" => $film, "list_seance" => $data, "currentPage" => $numero_page, "totalPages" => $nombre_afficher]);
                }
            }
        }
    }

    public function Annulation_Billet(Request $request)
    {
        $service = new Service();
        $idbillet = $request->input('idbillet');
        $idsalle = $request->input('idsalle');
        $rangee = $request->input('rangee');
        $place = $request->input('place');

        // echo $idbillet;

        $service->remove_Billet($idbillet);
        $service->remove_Place($idsalle, $rangee, $place);
        $service->remove_VenteBillet($idbillet);

        $list_typeBillet = $service->getType_Billet();
        $list_billet_one = $service->getBillet();
        $list_categorie = $service->getCategorie_film();

        return view('service_billet/achat_Billet', ['list_categorie' => $list_categorie, 'type_billet' => $list_typeBillet], ['list_billet_one' => $list_billet_one]);
    }
    public function achat_Billet()
    {
        $service = new Service();
        $list_typeBillet = $service->getType_Billet();
        $list_billet_one = $service->getBillet();
        $list_categorie = $service->getCategorie_film();

        return view('service_billet/achat_Billet', ['list_categorie' => $list_categorie, 'type_billet' => $list_typeBillet], ['list_billet_one' => $list_billet_one]);
    }
    public function create_service(Request $request)
    {
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $dtn = $request->input('dtn');
        $nombreBillet = $request->input('nombreBillet');
        if ($nombreBillet == 0) {
            $message = "nombre billet vide !";
            return view('table', ['message' => $message]);
        }

        $service = new Service();
        $data = $service->getService_complete($nom, $prenom, $dtn);

        if (empty($data)) {

            $service->ajoutClient($nom, $prenom, $dtn);
            $list = $service->getList_Billet($nombreBillet);
            if ($list < $nombreBillet) {
                $exception = "nombre de billet insuffisant";
                return view('service_billet/achat_billet', ['exception' => $exception, 'list' => $list]);
            } else {
                return view('service_billet/achat_billet', ['list' => $list]);
            }

        } else {
            $message = "service déja exist !";
            return view('table', ['message' => $message]);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function valider_billet(Request $request)
    {
        $idBillet = $request->input('idBillet');
        $idType_billet = $request->input('idType_billet');
        $idCategorie_film = $request->input('idCategorie_film');
        $service = new Service();
        // for ($i = 0; $i < count($idBillet); $i++) {
        //     $service->update_Billet($idBillet[$i]);
        // }
        if (empty($idBillet)) {
            $list_typeBillet = $service->getType_Billet();
            $list_billet_one = $service->getBillet();
            $list_categorie = $service->getCategorie_film();

            return view('service_billet/achat_Billet', ['list_categorie' => $list_categorie, 'type_billet' => $list_typeBillet], ['list_billet_one' => $list_billet_one]);
        }
        $list_film = $service->getFilm_Seance_ByCategorie($idCategorie_film);
        // echo $list_film[0];

        return view('diffusion/liste_diffusion', ['list_film' => $list_film, 'idType_billet' => $idType_billet, 'idBillet' => $idBillet]);
    }

    public function choisir_diffusion(Request $request)
    {
        $idBillet = $request->input('idBillet');
        $idType_billet = $request->input('idType_billet');
        $idSeance = $request->input('idSeance');

        // echo $idBillet[0] . $idType_billet . $idSeance;

        $service = new Service();

        /// $info_detail = $service->getInfoDiffusion_client($idClient);
        $liste_place = $service->getPlace_Dispo($idSeance);
        // echo $liste_place;
        return view('diffusion/choix_place', ['liste_place' => $liste_place, 'idBillet' => $idBillet[0], 'idType_billet' => $idType_billet, 'idSeance' => $idSeance]);
    }

    public function valider_place(Request $request)
    {
        $service = new Service();
        $idBillet = $request->input('idBillet');
        $idType_billet = $request->input('idType_billet');
        $idSeance = $request->input('idSeance');
        $idSalle = $request->input('idSalle');
        // valeur radio
        $placeChoisie = $request->input('place_rangee');

        $liste_place = explode(',', $placeChoisie);
        $rangee = $liste_place[0];
        $place = $liste_place[1];

        // echo 'rangee' . $rangee . 'place' . $place;
        if (empty($placeChoisie)) {
            $exception = "choisir votre place !";
            $liste_place = $service->getPlace_Dispo($idSeance);
            return view('diffusion/choix_place', ['exception' => $exception, 'liste_place' => $liste_place, 'idBillet' => $idBillet, 'idType_billet' => $idType_billet, 'idSeance' => $idSeance]);
        }
        $idSalle_place = $service->getIdSalle_place($place, $rangee, $idSalle);
        // echo 'idsalleplace' . $idSalle_place;
        $session = session();
        $id = $session->get('idp');
        $users = $service->getClient_ById($id);
        $service->create_vente_billet($users->idusers, $idBillet, $idSeance, $idSalle_place);
        $numero_billet = $service->getNumero_billetById($idBillet);
        $info_vente_billet = $service->getInfo_vente_billet($numero_billet);
        $service->update_Billet($idBillet);
        $service->update_Place($idSalle, $rangee, $place);
        // echo $info_vente_billet->numero_billet;
        // echo 'info_vente_billet' . $info_vente_billet->type_billet;

        return view('diffusion/info_client', ['users' => $users, 'info_vente_billet' => $info_vente_billet]);
    }
    public function valider_info_client(Request $request)
    {
        $id = $request->input('idvente_billet');
        $service = new Service();
        $vente_billet = $service->getVente_billetById($id);
        $session = session();
        $id_users = $session->get('idp');
        $users = $service->getClient_ById($id_users);

        return view('diffusion/valider_info_client', ['users' => $users, 'vente_billet' => $vente_billet]);
    }
    public function upload_image(Request $request)
    {
        // Vérifiez si le fichier a été téléchargé avec succès
        if ($request->hasFile('image')) {
            // Stockez le fichier dans le répertoire de stockage
            $path = $request->file('image')->store('images','public');

            // Vous pouvez également enregistrer le chemin d'accès dans la base de données si nécessaire
            // Exemple : $image = new Image();
            // $image->path = $path;
            // $image->save();

            return "Image téléchargée avec succès. Chemin d'accès : " . $path;
        }

        return "Aucune image n'a été téléchargée.";
    }

    public function upload_csv_test()
    {
        $service = new Service();
        $errors = [];

        $file = \request()->file('fichier');
        $fileContents = file($file->getPathname());
        $function = new Generalisation();
        foreach ($fileContents as $line) {
            $record = str_getcsv($line);
            // echo $line[0];

            $list_date = $service->getControlle_Date($record[4]);
            $list_heure = $service->getControlle_Heure($record[5]);
            DB::insert('insert into data_csv (numseance, film,categorie,salle,date,heure) values (?,?,?,?,?,?)', [$record[0], $record[1], $record[2], $record[3], $list_date, $list_heure]);
            // $function->inserts('data_csv', ['numseance' =>$record[0], 'film' => $record[1], 'categorie' => $record[2], 'salle' => $record[3], 'Date' => $record[4], 'Heure' => $record[5]]);
        }
        $list_langue = $function->select("langue", ["*"]);
        $phrase = $function->select("contenu", ["contenu"], ["id_langue" => 1]);
        return view('csv', ['list_langue' => $list_langue], ['phrase' => $phrase]);
    }

    public function upload_csv(Request $request)
    {
        $service = new Service();
        $errors_list = array();

        $file = \request()->file('fichier');
        $fileContents = file($file->getPathname());
        $function = new Generalisation();
        $lineNumber = 0; // Ajout d'un compteur de lignes
        foreach ($fileContents as $line) {
            $lineNumber++; // Incrémenter le numéro de ligne
            $record = str_getcsv($line);

            $list_date = $service->getControlle_Date($record[4]);
            $valid_date = $service->Is_DateValid($record[4]);

            if ($valid_date == 0) {
                $error_message = 'Erreur de date à la ligne ' . $lineNumber . ': ' . $line . ' -> ' . $record[4];
                // echo $error_message;
                array_push($errors_list, $error_message);
                $list_date = ($valid_date == 0) ? null : $list_date;
                // echo 'valeur date' . $list_date;
            }

            $list_heure = $service->getControlle_Heure($record[5]);
            $valid_heure = $service->Is_HeureValid($record[5]);

            if ($valid_heure == 0) {
                $error_message = 'Erreur heure à la ligne ' . $lineNumber . ': ' . $line . ' -> ' . $record[5];
                // echo $error_message;
                array_push($errors_list, $error_message);
                $list_heure = ($valid_heure == 0) ? null : $list_heure;
                // echo $list_heure;
            }

            DB::insert('insert into data_csv (numseance, film,categorie,salle,date,heure) values (?,?,?,?,?,?)', [$record[0], $record[1], $record[2], $record[3], $list_date, $list_heure]);
            // $function->inserts('data_csv', ['numseance' => $record[0], 'film' => $record[1], 'categorie' => $record[2], 'salle' => $record[3], 'Date' => $record[4], 'Heure' => $record[5]]);
        }
        $salle = DB::select("select salle from data_csv group by salle");
        $film = DB::select("select film from data_csv group by film");
        $categorie_film = DB::select("select categorie from data_csv group by categorie");
        $list_data = $function->select("data_csv", ["*"]);
        // echo "issaaa " . count($list_data);


        for ($i = 0; $i < count($categorie_film); $i++) {
            $function->inserts("categorie_film", ["categorie" => $categorie_film[$i]->categorie]);
            // echo $categorie_film[$i]->categorie;
        }
        for ($i = 0; $i < count($salle); $i++) {
            $function->inserts("salle", ["nom" => $salle[$i]->salle]);
        }

        DB::insert("insert into Salle_place(idsalle,rangee,Nom_place)values
            (1,1,'A1'),(1,1,'A2'),(1,1,'A3'),(1,1,'A4'),
            (1,2,'B1'),(1,2,'B2'),(1,2,'B3'),(1,2,'B4'),
            (1,3,'C1'),(1,3,'C2'),(1,3,'C3'),(1,3,'C4'),

            (2,1,'A1'),(2,1,'A2'),(2,1,'A3'),(2,1,'A4'),
            (2,2,'B1'),(2,2,'B2'),(2,2,'B3'),(2,2,'B4'),
            (2,3,'C1'),(2,3,'C2'),(2,3,'C3'),(2,3,'C4'),

            (3,1,'A1'),(3,1,'A2'),(3,1,'A3'),(3,1,'A4'),
            (3,2,'B1'),(3,2,'B2'),(3,2,'B3'),(3,2,'B4'),
            (3,3,'C1'),(3,3,'C2'),(3,3,'C3'),(3,3,'C4'),

            (4,1,'A1'),(3,1,'A2'),(3,1,'A3'),(3,1,'A4'),
            (4,2,'B1'),(3,2,'B2'),(3,2,'B3'),(3,2,'B4'),
            (4,3,'C1'),(3,3,'C2'),(3,3,'C3'),(3,3,'C4')");

        for ($i = 0; $i < count($film); $i++) {
            $idcategorie_film = $service->getId_CategorieByCategorie($categorie_film[$i]->categorie);
            $function->inserts("film", ["nom" => $film[$i]->film, "idcategorie_film" => $idcategorie_film->idcategorie_film]);
        }
        for ($i = 0; $i < count($list_data); $i++) {
            $idsalle = $service->getId_SalleByNom($list_data[$i]->salle);
            $idfilm = $service->getId_FilmByNom($list_data[$i]->film);
            $function->inserts("seance", ["numseance" => $list_data[$i]->numseance, "idsalle" => $idsalle, "idfilm" => $idfilm, "dates" => $list_data[$i]->date, "heure" => $list_data[$i]->heure]);
        }
        // echo 'error list -----' . $errors_list[0];
        return redirect()->route('Importcsv')->with('message',$errors_list);
        // return view('csv', ['message'=>$errors_list,'list_langue' => $list_langue], ['phrase' => $phrase]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idservice, $nom, $numero)
    {
        return view('service/service_update', ['idservice' => $idservice, 'nom' => $nom, 'numero' => $numero]);
    }

    // Function to validate data
    private function validateData($record)
    {
        // Perform your data validation here
        // For example, check if the date exists
        // If validation fails, return false; otherwise, return true
    }


    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
}
