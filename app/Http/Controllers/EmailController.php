<?php

namespace App\Http\Controllers;

use App\Email;
use App\Http\Requests\EmailRequest;
use App\Http\Resources\EmailResource;
use App\Http\Resources\EmailsResource;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('view', Email::class);
        return new EmailsResource(Email::orderBy('id', 'asc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailRequest $request)
    {
        //
        $this->authorize('create', Email::class);
        $email = new Email($request->all());

        $email->save();

        return response([
            'data' => new EmailResource($email)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
        $this->authorize('view', Email::class);
        EmailResource::withoutWrapping();

        return new EmailResource($email);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        //
        $this->authorize('update', Email::class);
        $email->update($request->all());

        return response([
            'data' => new EmailResource($email)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        //
        $this->authorize('delete', Email::class);
        $email->delete();
        return response(null, 204);
    }
}
