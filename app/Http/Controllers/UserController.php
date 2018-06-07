<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('before', User::class);
        return new UsersResource(User::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $this->authorize('create', User::class);
        $user = new User($request->all());

        $user->save();

        return response([
            'data' => new UserResource($user)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $this->authorize('view', $user);
        UserResource::withoutWrapping();
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $this->authorize('update', $user);
        $user->update($request->all());
        
        return response([
            'data' => new UserResource($user)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $this->authorize('delete', $user);
        $user->delete();

        return response(null, 204);
    }
}
