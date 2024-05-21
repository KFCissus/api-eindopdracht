<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use App\Models\Boodschaplijst;
use App\Models\klant;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tests\CreatesApplication;

use Illuminate\Support\Facades\Auth;



class KlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        Log::info(
            'klant list',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
            ]
        );

        return User::All();

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
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'


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

            $name = $request['name'];
            $email = $request['email'];
            $password = $request['password'];
            $klant = Klant::where('name', request('name'))->first();
            if ($klant){
                Log::error("Klant toevoegen Fout");
                $content = [
                    'success' => false,
                    'data'    => $request->all(),
                    'foutmelding' => 'klant bestaat al ',
                ];
                return response()->json($content, 400);
            }

             $newklant = User::Create(['name' => $name,'email'=>$email,'password'=>$password]);
            // $newklant->save();

            $neworder =  Order::Create(['klantId' => $newklant['id']]);

            $neworder->save();

            $newlijst = Boodschaplijst::FirstOrNew(['order_id'=>$neworder['id'],'item_id'=> null, 'count'=>'1']);
            $newlijst->save();

            return response()->json($newklant->id, 201);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\klant  $klant
     * @return \Illuminate\Http\Response
     */
    public function show(string $klant,Request $request)
    {
        Log::info(
            'Boodschappen list ',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
            ]
        );

        return User::find($klant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\klant  $klant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, klant $klant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\klant  $klant
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $klant,Request $request)
    {
        Log::info(
            'Boodschappen list ',
            [
                'ip' => $request->ip(),
                'data' => $request->all(),
            ]
        );

        User::destroy($klant);
    }






}
