<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Boodschaplijst extends Model
{
    protected $table = 'boodschappenlijst';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id',
        'klant_id',
        'count'
    ];

    use HasFactory;

    public function artikelen()
    {
        return $this->hasMany(artikel::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function price()
    {

        $order = Boodschaplijst::with(['artikel' => function ($query) {


        }]);


        $totalprice=0.0;

        foreach($order->orderline as $orderline){
            $totalprice+= $order->lineprice();


        }

        return $totalprice;
    }

}
