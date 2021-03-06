<?php

namespace App\Http\Controllers;

use App\Defensor;
use App\Http\Resources\DefensorResource;
use App\Http\Resources\DefensorsResource;
use App\Http\Requests\DefensorRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DefensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new DefensorsResource(Defensor::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DefensorRequest $request)
    {
        //
        $defensor = new Defensor($request->all());

        $defensor->save();

        return response([
            'data' => new DefensorResource($defensor)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Defensor  $defensor
     * @return \Illuminate\Http\Response
     */
    public function show(Defensor $defensor)
    {
        //
        DefensorResource::withoutWrapping();
        return new DefensorResource($defensor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Defensor  $defensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Defensor $defensor)
    {
        //
        $defensor->update($request->all());

        return response([
            'data' => new DefensorResource($defensor)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Defensor  $defensor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Defensor $defensor)
    {
        //
        $defensor->delete();

        return response(null, 204);
    }
}
