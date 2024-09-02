<?php

/**
 * Created by PhpStorm.
 * User: Abdulrahman
 * Date: 1/18/2019
 * Time: 11:10 ص
 */

namespace App\Exceptions;

use App\Exceptions\CustomException\LogicException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

trait ExceptionTrait
{
    /**
     * Creates a new JSON response based on exception type.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Throwable  $e
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getJsonResponseForException(Request $request, Throwable $e)
    {
        switch (true) {
            case $this->isQueryException($e) && $e->getCode() == '23000':
                return $this->jsonResponse(__('exceptions.violates_foreign_key_constraint'), null, 409);

            case $this->isModelNotFoundException($e):
                return $this->modelNotFound();

            case $this->isNotFoundHttpException($e):
                return $this->notFoundHttp();

            case $this->isAuthorizationException($e):
                return $this->forbidden();

            case $this->isAuthorizationSpatieException($e):
                return $this->forbiddenSpatie();

            case $this->isUnauthorizedException($e):
                return $this->unauthorized();

            case $this->isUnauthenticatedException($e):
                return $this->unauthenticated($request, $e);

            case $this->isThrottleRequestsException($e):
                return $this->tooManyRequests($request, $e);

            case $this->isLogicException($e):
                return $this->logicException($e);

            default:

                if (isProductionEnv()) {
                    return $this->badRequest();
                }

                return parent::render($request, $e);
        }
    }

    protected function isQueryException($e)
    {
        return $e instanceof QueryException;
    }

    protected function jsonResponse($message, $data = null, $status_code = 404)
    {
        $data = $data ?: [];

        $response = [
            'success' => false,
            'message' => $message,
            'data' => $data,
            'status_code' => $status_code,
        ];

        return response()->json($response, $status_code);
    }

    protected function isModelNotFoundException($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function isThrottleRequestsException($e)
    {
        return $e instanceof ThrottleRequestsException;
    }

    protected function modelNotFound()
    {
        return $this->jsonResponse(__('exceptions.record_not_found'), null, Response::HTTP_NOT_FOUND);
    }

    protected function isNotFoundHttpException($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function notFoundHttp()
    {
        return $this->jsonResponse(__('exceptions.route_not_found'), null, Response::HTTP_NOT_FOUND);
    }

    protected function isAuthorizationException($e)
    {
        return $e instanceof AuthorizationException;
    }

    protected function forbidden()
    {
        return $this->jsonResponse(__('exceptions.forbidden'), null, 403);
    }

    protected function isAuthorizationSpatieException($e)
    {
        return $e instanceof UnauthorizedException;
    }

    protected function forbiddenSpatie()
    {
        return $this->jsonResponse(__('exceptions.forbidden'), null, 403);
    }

    protected function isUnauthorizedException($e)
    {
        return $e instanceof UnauthorizedHttpException;
    }

    protected function unauthorized()
    {
        return $this->jsonResponse(__('exceptions.forbidden', null, 401));
    }

    protected function isUnauthenticatedException($e)
    {
        return $e instanceof AuthenticationException;
    }

    protected function unauthenticated()
    {
        return $this->jsonResponse(__('exceptions.login_required', null, 401));
    }

    protected function badRequest()
    {
        return $this->jsonResponse(__('exceptions.bad_request'), null, 500);
    }

    protected function tooManyRequests()
    {
        return $this->jsonResponse(__('exceptions.too_many_requests'), null, 429);
    }

    protected function queryException()
    {
        return $this->jsonResponse(__('exceptions.violates_foreign_key_constraint'), null, 409);
    }

    protected function isLogicException($e)
    {
        return $e instanceof LogicException;
    }

    protected function logicException(Throwable $e)
    {
        return sendError(
            $e->getMessage(),
            $e->getData(),
            $e->getCode(),
            $e->getErrorKey() ? [$e->getErrorKey() => $e->getMessage()] : $e->getMessage()
        );
    }
}
