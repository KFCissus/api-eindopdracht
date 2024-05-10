<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;

    protected $table = 'artikelen';

    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'prijs'
    ];

    public function lijsten()
    {
        return $this->belongsToMany(Boodschaplijst::class);
    }

    public function lineprice()
    {
        $price = $this->Prijs;
        return $price;
    }
}
