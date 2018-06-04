<?php

namespace App\Http\Controllers;

use App\Pasta;
use App\Http\Requests\PastaRequest;
use App\Http\Resources\PastaResource;
use App\Http\Resources\PastasResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new PastasResource(Pasta::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PastaRequest $request)
    {
        //
        $pasta = new Pasta($request->all());

        $pasta->save();

        return response([
            'data' => new PastaResource($pasta)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function show(Pasta $pasta)
    {
        //
        PastaResource::withoutWrapping();
        return new PastaResource($pasta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasta $pasta)
    {
        //
        $pasta->update($request->all());

        return response([
            'data' => new PastaResource($pasta)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasta $pasta)
    {
        //
        $pasta->delete();

        return response(null, 204);
    }
}
