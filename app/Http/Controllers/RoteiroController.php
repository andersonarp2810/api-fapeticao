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
        $this->authorize('view', Roteiro::class);
        return new RoteirosResource(Roteiro::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoteiroRequest $request)
    {
        $this->authorize('create', Roteiro::class);
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
        $this->authorize('view', Roteiro::class);
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
        $this->authorize('update', $roteiro);
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
        $this->authorize('delete', $roteiro);
        $roteiro->delete();

        return response(null, HTTPResponse::HTTP_NO_CONTENT);
    }
}
