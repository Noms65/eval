<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function getUser($name,$password){
        $sql = "SELECT * FROM users WHERE nom='%s' AND password='%s'";
            $sql = sprintf($sql, $name, $password);
            $users = DB::select($sql); 
        return $users;
    }

    public function getUserById($id){
        $sql = "SELECT * FROM users WHERE id='%g'";
            $sql = sprintf($sql,$id);
            $users = DB::select($sql);
        return $users;
    }

    public function create($name,$prenom,$password){
        $sql = "INSERT INTO users  (nom, prenom, password) VALUES ( '%s','%s','%s')";
            $sql = sprintf($sql, $name,$prenom, $password);
            $users = DB::select($sql);
    }

    // public function delete($id){
    //     $sql = "SELECT * FROM users WHERE id='%g'";
    //         $sql = sprintf($sql, $id);
    //         $users = DB::delete($sql);
    //     return $users;
    // }

    // public function update($id,$nom,$prenom,$password){
    //     $sql="update users set ".$nom." and prenom ='".$prenom."' and password ='".$password."' where id=".$id;
    //         $users = DB::update($sql);
    //     return $users;
    // }

    // public function getId($users){
    //     $session = session();
    //     $session->put($users,$users['id']);
    //     return $users['id'];
    // }

    // public function getIdSession(){
    //     $session = session();
    //     $id = $session->get('id');
    //     echo $id;
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
