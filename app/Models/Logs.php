<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Logs extends Model
{


    protected $Table="Logs";

    protected  $fillable = [
        "status",
        "log",
        "header",
        "action"
    ];


}
