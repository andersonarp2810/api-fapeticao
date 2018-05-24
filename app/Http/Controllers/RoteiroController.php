<?php

namespace App\Http\Controllers;

use App\Roteiro;
use App\Http\Resources\RoteiroResource;
use App\Http\Resources\RoteirosResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\RoteiroRequest;
use Symfony\Component\HttpFoundation\Response as HTTPResponse;

use Exception;

class RoteiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new RoteirosResource(Roteiro::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoteiroRequest $request)
    {
        $roteiro = new Roteiro($request->all());

        $roteiro->save();

        return response([
            'data' => new RoteiroResource($roteiro)
        ], HTTPResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Roteiro  $roteiro
     * @return \Illuminate\Http\Response
     */
    public function show(Roteiro $roteiro)
    {
        //
        RoteiroResource::withoutWrapping();
        return new RoteiroResource($roteiro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roteiro  $roteiro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roteiro $roteiro)
    {
        $roteiro->update($request->all());

        return response([
            'data' => new RoteiroResource($roteiro)
        ], HTTPResponse::HTTP_CREATED);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Roteiro  $roteiro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roteiro $roteiro)
    {
        $roteiro->delete();

        return response(null, HTTPResponse::HTTP_NO_CONTENT);
    }
}
