<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

trait ExceptionTrait
{

	public function apiException($request,$e)
	{
		if ($this->isAccess($e)) {
			return $this->AccessResponse($e); // checar request
		}
		if ($this->isModel($e)) {
			return $this->ModelResponse($e);
		}
		if ($this->isHttp($e)) {
			return $this->HttpResponse($e);
		}
		dd(['a' => $request, 'b' => $e]);
		return parent::render($request, $e);
    }
	
	protected function isAccess($e){
		return $e instanceof AccessDeniedHttpException | $e instanceof AuthorizationException;
	}

	protected function isModel($e)
	{
		return $e instanceof ModelNotFoundException;
    }
    
	protected function isHttp($e)
	{
		return $e instanceof NotFoundHttpException; 
    }
    
	protected function ModelResponse($e)
	{
		return response()->json([
            'error' => 'Objeto não encontrado'
        ],Response::HTTP_NOT_FOUND);
    }
    
	protected function AccessResponse($e)
	{
		return response()->json([
            'error' => 'Não autorizado'
        ],Response::HTTP_FORBIDDEN);
    }
    
	protected function HttpResponse($e)
	{
		return response()->json([
            'error' => 'Rota incorreta'
        ],Response::HTTP_NOT_FOUND);
	}
}