<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class klant extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'klanten';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];


    public function boodschapplijst()
    {
        return $this->hasOne(Boodschaplijst::class, 'id','boodschappenlijstId' );
    }
}
