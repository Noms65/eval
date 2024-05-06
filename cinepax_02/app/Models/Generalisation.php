<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Shared\Date;
class Generalisation extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function login($table,$email, $password){
        $data= DB::table($table)
                ->where('email','=',$email)
                ->where('password','=',$password)
                ->get();
        return $data;
    }
    function inserts($table,$argument){


        $query= DB::table($table)->insert($argument);
    return $query;
    }
    function select($table, $columns = ['*'], $conditions = [],$orderBy = [], $limit = null) {
        $query = DB::table($table)->select($columns);

        if (!empty($conditions)) {
        foreach ($conditions as $column => $value) {
            $query->where($column, $value);
        }
    }

        // if (!empty($conditions)) {
        //     foreach ($conditions as $condition) {
        //         $query->where(...$condition);
        //     }
        // }

        // if (!empty($orConditions)) {
        //     $query->where(function ($query) use ($orConditions) {
        //         foreach ($orConditions as $condition) {
        //             $query->orWhere(...$condition);
        //         }
        //     });
        // }

        foreach ($orderBy as $column => $direction) {
            $query->orderBy($column, $direction);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }
        // dump($query);
        return $query->get();
    }
    function updates($table, $data, $conditions, $callback = null) {
        DB::beginTransaction();

        try {
            $query = DB::table($table);

            foreach ($conditions as $column => $value) {
                $query->where($column, $value);
            }

            $query->update($data);

            if ($callback !== null && is_callable($callback)) {
                $callback($data);
                // echo "callback";
            }

            DB::commit();
            // echo "commit";
            return $query->count();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function deleteData($id,$table)
    {
        DB::table($table)->whereRaw('idservice = ?', [$id])->delete();
        return redirect()->back()->with('success', 'suppression avec succes');
    }

    function deletes($id,$colone,$table,$table1)
    {
        try {
            DB::transaction(function () use ($id,$colone,$table,$table1) {

                DB::table($table1)->where($colone, $id)->update([$colone => null]);
                DB::table($table)->where('id', $id)->delete();
            });

            return redirect()->back()->with('success', '');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
}
