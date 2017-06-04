<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Addr extends Model
{
    protected $table='hotel_addr';
    protected $primaryKey='addrId';
    public $timestamps=false;

}
