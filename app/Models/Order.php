<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'orders';
    protected $fillable = [
        'klantId'
    ];

    public function klant()
    {
        return $this->belongsTo(Klant::class, 'id','klantId' );
    }
}
