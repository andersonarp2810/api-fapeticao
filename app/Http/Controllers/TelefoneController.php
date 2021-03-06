<?php

namespace App\Http\Controllers;

use App\Telefone;
use App\Http\Requests\TelefoneRequest;
use App\Http\Resources\TelefoneResource;
use App\Http\Resources\TelefonesResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('before', Telefone::class);
        return new TelefonesResource(Telefone::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TelefoneRequest $request)
    {
        //
        $this->authorize('create', Telefone::class);
        $telefone = new Telefone($request->all());

        $telefone->save();

        return response([
            'data' => new TelefoneResource($telefone)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function show(Telefone $telefone)
    {
        //
        $this->authorize('show', $telefone);
        TelefoneResource::withoutWrapping();
        return new TelefoneResource($telefone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Telefone $telefone)
    {
        //
        $this->authorize('update', $telefone);
        $telefone->update($request->all());

        return response([
            'data' => new TelefoneResource($telefone)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Telefone $telefone)
    {
        //
        $this->authorize('delete', $telefone);
        $telefone->delete();

        return response(null, 204);
    }
}
