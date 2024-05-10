<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Boodschaplijst;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BoodscapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info(
            'Boodschappen list ',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
            ]
        );

        return Boodschaplijst::All();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Boodschaplijst $boodschaplijst)
    {
        Log::info(
            'Boodschappen list store',
            ['ip' => $request->ip(), 'oud' => $boodschaplijst, 'nieuw' => $request->all()]
        );

        $validator = Validator::make($request->all(), [

            "id" => 'required',
            "order_id" => 'required',
            "count" => 'required',
            "item_id"=> 'required'

        ]);
        if ($validator->fails()) {
            Log::error("Fout bij opslaan van lijst");
            $content = [
                'success' => false,
                'data'    => $request->all(),
                'foutmelding' => 'Gewijzigde data niet correct',
            ];
            return response()->json($content, 400);
        } else {
            $content = [
                'success' => $boodschaplijst->where('order_id',$request->order_id)->Create($request->all()),
                'data'    => $request->only(['order_id', 'item_id']),
            ];
            return response()->json($content, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boodschaplijst  $boodschaplijst
     * @return \Illuminate\Http\Response
     */
    public function show(string $klantId, Request $request)
    {
        Log::info(
            'Boodschappen list ',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
            ]
        );
        $order = Order::where('klantId', $klantId)->first();

        return Boodschaplijst::where('order_id', $order->id)->get();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boodschaplijst  $boodschaplijst
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boodschaplijst $boodschaplijst)
    {


    }


    public function totaalPrijs(Request $request, Boodschaplijst $boodschaplijst)
    {


        Log::info(
            'Boodschappen list ',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
            ]
        );
        $order = Boodschaplijst::with(['artikel' => function ($query) {


        }]);

        return $order->lineprice();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boodschaplijst  $boodschaplijst
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $boodschaplijst,Request $request)
    {
        Log::info(
            'Boodschappen list ',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
            ]
        );
        Boodschaplijst::destroy($boodschaplijst);
    }
}
