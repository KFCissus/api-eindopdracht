<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info(
            'artikel list s',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
            ]
        );
            return Artikel::All();



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info(
            'artikels store',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
            ]
        );
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'prijs'=> 'required'
        ]);
        if ($validator->fails()) {
            Log::error("artikel toevoegen Fout");
            $content = [
                'success' => false,
                'data'    => $request->all(),
                'foutmelding' => 'Data niet correct',
            ];
            return response()->json($content, 400);
        } else {


            return artikel::create
            ($request->only
                (
                    [
                    'name',
                    'prijs'
                    ]
                )
            );

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(string $artikel,Request $request)
    {
        Log::info(
            'Artikel show',
            [
                'ip' => $request->ip(),
                'artikel' => $artikel ,
                'data' => $request->all()

            ]
        );

        return artikel::find($artikel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, artikel $artikel)
    {        Log::info(
        'artikels update',
        ['ip' => $request->ip(), 'oud' => $artikel, 'nieuw' => $request->all()]
    );

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'prijs' => 'required',
        ]);
        if ($validator->fails()) {
            Log::error("artikels wijzigen Fout");
            $content = [
                'success' => false,
                'data'    => $request->all(),
                'foutmelding' => 'Gewijzigde data niet correct',
            ];
            return response()->json($content, 400);
        } else {
            $content = [
                'success' => $artikel->where('id',$request->id)->update($request->all()),
                'data'    => $request->only(['naam', 'prijs']),
            ];
            return response()->json($content, 200);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $artikel,Request $request)
    {
        Log::info(
            'Artikel list ',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
            ]
        );

        artikel::destroy($artikel);
    }



}
