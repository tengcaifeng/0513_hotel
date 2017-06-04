<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table='hotel_mark';
    protected $primaryKey='markId';
    public $timestamps=false;
}
