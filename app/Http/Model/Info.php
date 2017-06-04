<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table='hotel_info';
    protected $primaryKey='infoId';
    public $timestamps=false;
}
