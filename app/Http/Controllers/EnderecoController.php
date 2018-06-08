<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Http\Requests\EnderecoRequest;
use App\Http\Resources\EnderecoResource;
use App\Http\Resources\EnderecosResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('view', Endereco::class);
        return new EnderecosResource(Endereco::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnderecoRequest $request)
    {
        //
        $this->authorize('create', Endereco::class);
        $endereco = new Endereco($request->all());
        $endereco->save();
        return response([
            'data' => new EnderecoResource($endereco)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show(Endereco $endereco)
    {
        //
        $this->authorize('view', Endereco::class);
        EnderecoResource::withoutWrapping();
        return new EnderecoResouce($endereco);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Endereco $endereco)
    {
        //
        $this->authorize('update', Endereco::class);
        $endereco->update($request->all());

        return response([
            'data' => new EnderecoResource($endereco)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Endereco $endereco)
    {
        //
        $this->authorize('delete', Endereco::class);
        $endereco->delete();
        return response(null, 204);
    }
}
