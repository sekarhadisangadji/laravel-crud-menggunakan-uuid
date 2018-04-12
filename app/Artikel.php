<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Artikel extends Model
{
    use Uuids;

    public $incrementing = false;
    
    protected $table = 'artikels';

    protected $fillable = [
        'id','id_user','title','content','created_at','updated_at'
    ];
}
