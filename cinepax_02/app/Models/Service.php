<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Generalisation;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;

    public function ajoutClient($nom, $prenom, $dtn)
    {
        $function = new Generalisation();
        $function->inserts("client", ["nom" => $nom, "prenom" => $prenom, "dtn" => $dtn]);
    }

    public function ajoutClient_Diffusion($idbillet, $iddiffusion, $idclient)
    {
        $function = new Generalisation();
        $function->inserts("client_diffusion", ["idbillet" => $idbillet, "iddiffusion" => $iddiffusion, "idclient" => $idclient]);
    }
    public function update_seance($id, $numseance, $idsalle, $idfilm, $dates, $heure)
    {
        $function = new Generalisation();
        $function->updates('seance', ['numseance' => $numseance], ['idseance' => $id]);
        $function->updates('seance', ['idsalle' => $idsalle], ['idseance' => $id]);
        $function->updates('seance', ['idfilm' => $idfilm], ['idseance' => $id]);
        $function->updates('seance', ['dates' => $dates], ['idseance' => $id]);
        $function->updates('seance', ['heure' => $heure], ['idseance' => $id]);
    }
    public function update_service($id, $nom, $numero)
    {
        $function = new Generalisation();
        $function->updates('service', ['nom' => $nom], ['idservice' => $id]);
        $function->updates('service', ['numero' => $numero], ['idservice' => $id]);
    }
    public function update_Billet($id)
    {
        $function = new Generalisation();
        $function->updates('billet', ['dispo' => "false"], ['idbillet' => $id]);
    }
    public function remove_Billet($id)
    {
        $function = new Generalisation();
        $function->updates('billet', ['dispo' => "true"], ['idbillet' => $id]);
    }
    public function remove_VenteBillet($idBillet)
    {
        DB::delete('delete from vente_billet where idbillet = ?', [$idBillet]);
    }
    public function remove_Seance($idseance)
    {
        DB::delete('delete from seance where idseance = ?', [$idseance]);
    }
    public function ajout_seance($numero, $idsalle, $idfilm, $dates, $heure)
    {
        DB::insert('insert into seance (numseance,idsalle,idfilm,dates,heure) values (?, ?,?,?,?)', [$numero, $idsalle, $idfilm, $dates, $heure]);
    }
    public function update_Place($idsalle, $rangee, $nom_place)
    {
        $function = new Generalisation();
        $function->updates('salle_place', ['dispo' => "false"], ['idsalle' => $idsalle, 'nom_place' => $nom_place, 'rangee' => $rangee]);
    }
    public function remove_Place($idsalle, $rangee, $nom_place)
    {
        $function = new Generalisation();
        $function->updates('salle_place', ['dispo' => "true"], ['idsalle' => $idsalle, 'nom_place' => $nom_place, 'rangee' => $rangee]);
    }

    public function getListService()
    {
        $function = new Generalisation();
        return $function->select("service");
    }
    public function verifier_Seance($numero, $idsalle, $idfilm, $dates, $heure)
    {
        $function = new Generalisation();
        $data = $function->select("seance", ["idseance"], ["numseance" => $numero, "idsalle" => $idsalle, "idfilm" => $idfilm, "dates" => $dates, "heure" => $heure]);
        if (empty($data)) {
            return 0;
        } else {
            return 1;
        }
    }
    public function filtre_SeanceByCategorie($categorie){
        return DB::select("select * from v_getseance where categorie_film = ? ",[$categorie]);
    }

    public function getClient_ById($id)
    {
        $data = DB::select("select * from users where idusers =?", [$id]);
        return $data[0];
    }
    public function getStat_venteBillet()
    {
        return DB::select("select * from v_getvente_billet");
    }
    public function verifier_Users($nom,$prenom)
    {
        $data = DB::select("select * from users where nom =? and prenom =?", [$nom,$prenom]);
        return $data;
    }
    public function getList_Diffusion()
    {
        $function = new Generalisation();
        return $function->select("all_diffusion");
    }
    public function getInfoDiffusion_client($idclient)
    {
        $function = new Generalisation();
        return $function->select("info_diffusion", ["*"], ["idclient" => $idclient]);
    }

    public function getType_Billet()
    {
        $function = new Generalisation();
        return $function->select("types_billet", ["*"]);
    }
    public function getBillet()
    {
        $function = new Generalisation();
        return $function->select("billet", ["*"], ["dispo" => "true"], ['numero'=>'asc'], ['limit' => 1]);
    }
    public function getCategorie_film()
    {
        $function = new Generalisation();
        return $function->select("categorie_film", ["*"]);
    }
    public function getFilm_Seance_ByCategorie($idCategorie)
    {
        $function = new Generalisation();
        return $function->select("v_getseance", ["*"], ['idcategorie_film' => $idCategorie]);
    }
    public function getPlace_Dispo($idSeance)
    {
        $function = new Generalisation();
        $idSalle = $function->select("seance", ["*"], ["idseance" => $idSeance]);
        // $list_place = $function->select("v_getsalle_place",["*"],["idsalle"=>$idSalle]);
        $list_place = DB::select("select * from v_getsalle_place where dispo = true and idsalle=?", [$idSalle[0]->idsalle]);
        // echo $idSalle[0]->idsalle;
        return $list_place;
    }
    public function create_vente_billet($idUsers, $idBillet, $idSeance, $idSalle_place)
    {
        $function = new Generalisation();
        $function->inserts("vente_billet", ["idusers" => $idUsers, "idbillet" => $idBillet, "idseance" => $idSeance, "idsalle_place" => $idSalle_place]);
    }
    public function create_Users($nom,$prenom,$password)
    {
        $function = new Generalisation();
        $function->inserts("users", ["nom" => $nom, "prenom" => $prenom, "password" => $password]);
    }
    public function getIdSalle_place($nom_place, $rangee, $idsalle)
    {
        $function = new Generalisation();
        $data = $function->select("salle_place", ["idsalle_place"], ["nom_place" => $nom_place, "rangee" => $rangee, "idsalle" => $idsalle]);
        // $data=DB::select("select idsalle_place from salle_place where nom_place='?' and rangee=? and idsalle=?",[$nom_place,$rangee,$idsalle]);
        return $data[0]->idsalle_place;
    }
    public function getInfo_vente_billet($numero_billet)
    {
        $function = new Generalisation();
        $data = $function->select("v_getvente_billet", ["*"], ["numero_billet" => $numero_billet]);
        return $data[0];
    }
    public function getVente_billetById($id)
    {
        $function = new Generalisation();
        $data = $function->select("v_getvente_billet", ["*"], ["idvente_billet" => $id]);
        return $data[0];
    }
    public function getNumero_billetById($idBillet)
    {
        $function = new Generalisation();
        $data = $function->select("billet", ["numero"], ["idbillet" => $idBillet]);
        return $data[0]->numero;
    }
    public function getAll_Salle()
    {
        $function = new Generalisation();
        $data = $function->select("salle", ["*"]);
        return $data;
    }
    public function getAll_Film()
    {
        $function = new Generalisation();
        $data = $function->select("film", ["*"]);
        return $data;
    }
    public function getAll_Categorie_Film()
    {
        $function = new Generalisation();
        $data = $function->select("categorie_film", ["*"]);
        return $data;
    }
    function getList_Billet($nombreBillet)
    {
        // $data=DB::select('select * from service');
        $function = new Generalisation();
        //  exemple
        // $data = $function->select("service",["*"],[],["nom"=>"asc"]);

        $data = $function->select("billet", ["*"], ["dispo" => "true"], [], $nombreBillet);
        // echo $data;
        return $data;
    }
    public function getService_ById($id)
    {
        $data = DB::select("select * from service where idservice=?", [$id]);
        return $data[0];
    }
    public function getId_CategorieByCategorie($categorie_film)
    {
        $data = DB::select("select idcategorie_film from categorie_film where categorie=?", [$categorie_film]);
        return $data[0];
    }
    public function getId_SalleByNom($salle)
    {
        $data = DB::select("select idsalle from salle where nom=?", [$salle]);
        return $data[0]->idsalle;
    }
    public function getId_FilmByNom($film)
    {
        $data = DB::select("select idfilm from film where nom=?", [$film]);
        return $data[0]->idfilm;
    }
    public function getBillet_ById($id)
    {
        $data = DB::select("select * from billet where idbillet=?", [$id]);
        return $data[0];
    }
    public function getService_complete($nom, $prenom, $dtn)
    {
        $data = DB::select("select * from client where nom=? and prenom=? and dtn=? ", [$nom, $prenom, $dtn]);
        echo count($data);
        return $data;
    }

    // Controlle des valeurs import
    public function getControlle_Integer($data)
    {
        if (is_integer($data)) {
            return $data;
        } else {
            try {
                // spiltena ny data
                // esorina izay tsy integer
                // mamerina data

            } catch (\Throwable $th) {
                //throw $th;
            }
            return $data;
        }
    }
    public function getControlle_String($data)
    {
        $data = explode(' ', $data);
        return $data;
    }
    public function Is_DateValid($data)
    {
        try {
            DB::insert("insert into data_testdate(date)values(?)", [$data]);
            // echo 'mety e';
            return true;
        } catch (\Throwable $th) {
            //throw $th;
            // echo 'error e';
            return false;
        }
    }
    public function Is_HeureValid($data)
    {
        try {
            DB::insert("insert into data_testheure(heure)values(?)", [$data]);
            return true;
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }
    public function getControlle_Date($data)
    {
        // form => AA-MM-JJ   ,   (/) => (-)
        $date = array();
        $date = explode('/', $data);
        return $date[2] . '-' . $date[1] . '-' . $date[0];
    }
    public function getControlle_Heure($data)
    {
        return $data . ':00';
    }
    public function getControlle_Timestamp($data)
    {
        return $data;
    }


}
