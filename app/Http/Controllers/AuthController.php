<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]); #todas as rotas exceto \login passam pelo middlware auth:api
    }
    
    //
    public function login(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['erro' => 'Credenciais inválidas'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['erro' => 'Não foi possível criar o token'], 500);
        }

        // all good so return the token
        return response([
            'token' => $token,
            'usuário' => new UserResource(auth()->user())
        ], 200, ['Teste' => 'pega fi duma egua']);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     * 
     * Requer:
     *  Headers: 
     *      Authorization: Bearer $token
     */
    public function me()
    {
        return response([
            'usuário' => new UserResource(auth()->user()),
            'expira_em' => auth()->factory()->getTTL() #tempo em minutos
        ], 200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     * 
     * Requer:
     *  Headers: 
     *      Authorization: Bearer $token
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'message' => 'Desconectado com sucesso'
            ]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     * 
     * Requer:
     *  Headers: 
     *      Authorization: Bearer $token
     * 
     * Retorna:
     *  JSON
     *      ver respondeWithToken($token)    
     */
    public function refresh()
    {
        return $this->respondWithToken(
            auth()->refresh() #retorna um novo token e invalida o antecessor
        );
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     * 
     * Usado por: 
     *  refresh()
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'novo_token' => $token,
            'expira_em' => auth()->factory()->getTTL() #tempo em minutos
        ]);
    }
}
