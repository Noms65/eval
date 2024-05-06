<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use mysql_xdevapi\ColumnResult;

class Functions
{
    //login
    public function  loginin($email,$password){
        $sql="sel ect count(*) from point_vente where email='%s' and password='%s'";
        $sql=sprintf($sql,$email,$password);
        $data=DB::select($sql);
        return $data[0]->count;
    }
    public function  data_login($email,$password){
        $sql="select * from point_vente where email='%s' and password='%s'";
        $sql=sprintf($sql,$email,$password);
        $data=DB::select($sql);
        return $data;
    }
    public function  login_Magasin($email,$password){
        $sql="select count(*) from magasin where email='%s' and password='%s'";
        $sql=sprintf($sql,$email,$password);
        $data=DB::select($sql);
        return $data[0]->count;
    }
    //liste_laptop
    public function  liste_laptop(){
        return DB::table("v_detail_laptop")->simplePaginate(3);
    }
    public function liste_table($table){
        $sql="select * from  %s";
        $sql=sprintf($sql,$table);
        return DB::select($sql);
    }
    //insertion_laptop
    public function ajout_laptop($idmarque,$modele,$idprocesseur,$idram,$idstockage,$idecran,$image,$extension){
        $sql='insert into  laptop values (default,?,?,?,?,?,?,?,?)';
        $data=[$idmarque,$modele,$idprocesseur,$idram,$idstockage,$idecran,$image,$extension];
        $insert=DB::insert($sql,$data);
        dd($insert);
        //return DB::insert($sql,$data);
    }

    //suppresion
    public function deleteData($id,$table)
    {
        DB::table($table)->whereRaw('id = ?', [$id])->delete();
        return redirect()->back()->with('success', 'suppression avec succes');
    }

    public function update($update,$id){
        $sql="update laptop set ".$update." where id='".$id."'";
        DB::update($sql);
    }

    // donnees de reference
    public function liste_table_paginate($table){
        return DB::table($table)->simplePaginate(3);
    }

    public function update_donnee($update,$id,$table){
        $sql="update ".$table." set ".$update." where id='".$id."'";
        DB::update($sql);
    }
    public function update_marque($id,$marque)
    {
        if ($marque != '') {
            $this->update_donnee("marque='" . $marque . "'", $id,'marque');
        }
    }

    public function ajout2($table,$data1,$data2){
        return DB::insert('insert into '.$table.' values(default,?,?)', [$data1,$data2]);
    }
    public function ajout3($table,$data1,$data2,$data3){
        return DB::insert('insert into '.$table.' values(default,?,?,?)', [$data1,$data2,$data3]);
    }
    function getlaptopt_nonvendu($id_pointdevente){
        $noaffected = DB::table('vente')
            ->pluck('id_laptop')
            ->toArray();
        $data= DB::table('v_detail_recu')
            ->where('id_pointdevente','=',$id_pointdevente)
            ->where('quantite','>','0')
            ->get();
        return $data;
    }
    function getreste($idl,$idp,$prix){
        return DB::table('reception')
            ->where('id_laptop', '=', $idl)
            ->where('id_pointdevente', '=', $idp)
            ->update(['quantite' => $prix]);
    }

    function getbyid($id,$table){
        $data=DB::select('select * from '.$table.' where id='.$id.'');
        return $data;
    }
    function getbyidlap($id){
        $data=DB::select('select * from stock_magasin where idlaptop='.$id.'');
        return $data[0]->prix_unitaire;
    }
    function getlaptopt_recu($id_pointdevente){
        $data= DB::table('v_detail_recu')
            ->where('id_pointdevente','=',$id_pointdevente)
            ->simplepaginate(10);
        return $data;
    }
    function recherche($keyword,$table,$id)
    {
        $motsCles = explode(" ", $keyword);
        $query = DB::table($table)
            ->where(function ($q) use ($motsCles) {
                foreach ($motsCles as $motCle) {
                    $q->orWhere('marque', 'like', '%' . $motCle . '%')
                        ->orWhere('modele', 'like', '%' . $motCle . '%')
                        ->orWhere('modele_p', 'like', '%' . $motCle . '%')
                        ->orWhere('reference_r', 'like', '%' . $motCle . '%')
                        ->orWhere('ram', 'like', '%' . $motCle . '%')
                        ->orWhere('pouce', 'like', '%' . $motCle . '%')
                        ->orWhere('reference_s', 'like', '%' . $motCle . '%')
                        ->orWhere('stockage', 'like', '%' . $motCle . '%')
                        ->orWhere('generation', 'like', '%' . $motCle . '%');
                }
            });

        $prixMin = null;
        $prixMax = null;

        // Recherche du prix minimum et maximum dans $keyword
        if (preg_match('/(\d+);(\d+)/', $keyword, $matches)) {
            if (isset($matches[1])) {
                $prixMin = $matches[1];
            }
            if (isset($matches[2])) {
                $prixMax = $matches[2];
            }
        }
        if ($id !== null) {
            $query->where('id_pointdevente', '=', $id);
        }
        if ($prixMin !== null || $prixMax !== null) {
            $query->orwhereBetween('prixunitaire', [$prixMin, $prixMax]);

        }
        $results = $query->simplePaginate(6);
        return $results;
    }
    public function  commission(){
       return DB::select("
         select *,
          case
           when total>0 and total<=2000000 then (total*3)/100
           when total>2000001 and total<=5000000 then (2000000*3)/100+((total-2000000)*8)/100
           when total>5000001 and total<=300000000 then (2000000*3)/100+(5000000*8)/100+((total-5000000)*15)/100
           end  commission
         from v_mois_pointvente");
    }
    public function filtre_by($mois,$annee){
        return DB::select("select quantite,prix,modele,extract(month from date) as m,extract(years from date) as y from vente_laptop where extract(month from date)=? and extract(years from date)=?",[$mois,$annee]);
    }
}
