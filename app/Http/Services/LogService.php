<?php


namespace App\Http\Services;
use App\Models\Logs;

class  LogService
{


    private static function make(array $data)
    {
        Logs::create(
            $data
        );

    }

    public static function set(int $status,string  $data, array $header, string $action){

       self::make([
           "status"=>$status,
           "log"=>$data,
           "header"=>json_encode($header),
           "action"=>$action
       ]);
    }

    public static function get(){
        return Logs::all();
    }

}
