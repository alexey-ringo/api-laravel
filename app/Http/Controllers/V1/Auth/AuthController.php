<?php

namespace App\Http\Controllers\V1\Auth;

use App\Domains\Auth\Actions\CheckAuthAction;
use App\Domains\Auth\Actions\ConfirmAuthAction;
use App\Domains\Auth\Actions\FetchUserAuthAction;
use App\Domains\Auth\Actions\LoginAuthAction;
use App\Domains\Auth\Actions\LogoutAuthAction;
use App\Domains\Auth\Actions\RecoveryAuthAction;
use App\Domains\Auth\Actions\RegisterAuthAction;
use App\Domains\Auth\Actions\UserAuthAction;
use App\Domains\Auth\Dto\CheckAuthRequestDto;
use App\Domains\Auth\Dto\ConfirmAuthRequestDto;
use App\Domains\Auth\Dto\FetchUserAuthRequestDto;
use App\Domains\Auth\Dto\LogoutAuthRequestDto;
use App\Domains\Auth\Dto\RecoveryAuthRequestDto;
use App\Domains\Auth\Dto\RegisterAuthRequestDto;
use App\Domains\Auth\Dto\UserAuthRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Http\Requests\Auth\CheckAuthRequest;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Auth\ConfirmAuthRequest;
use App\Http\Requests\Auth\FetchUserAuthRequest;
use App\Http\Requests\Auth\LogoutAuthRequest;
use App\Http\Requests\Auth\RecoveryAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Http\Requests\Auth\UserAuthRequest;
use App\Http\Resources\DefaultResource;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AuthController extends Controller
{
    const CHECK = 'auth-check';
    const REGISTER = 'auth-register';
    const RECOVERY = 'auth-recovery';
    const CONFIRM = 'auth-confirm';
    const LOGIN = 'auth-login';
    const LOGOUT = 'auth-logout';
    const USER = 'auth-user';
    const FETCH_USER = 'auth-fetch_user';

    /**
     * Check auth users from Auth Service.
     *
     * @OA\Post(
     *     path="/auth/check",
     *     operationId="checkAuth",
     *     tags={"Auth"},
     *     summary="Check auth users from Auth Service",
     *     description="Returns auth status",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CheckAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/AuthResponseDto")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function check(CheckAuthRequest $request, CheckAuthAction $action)
    {
        $this->authorizeToken(self::CHECK);
        $dto = new CheckAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Register new user on Auth Service.
     *
     * @OA\Post(
     *     path="/auth/register",
     *     operationId="registerAuth",
     *     tags={"Auth"},
     *     summary="Register new user on Auth Service",
     *     description="Register new user on Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/TokenAuthResponseDto")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function register(RegisterAuthRequest $request, RegisterAuthAction $action)
    {
        $this->authorizeToken(self::REGISTER);
        $dto = new RegisterAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Recovery exists user on Auth Service.
     *
     * @OA\Post(
     *     path="/auth/recovery",
     *     operationId="recoveryAuth",
     *     tags={"Auth"},
     *     summary="Recovery exists user on Auth Service",
     *     description="Returns auth status",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RecoveryAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/AuthResponseDto")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     * )
     *
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function recovery(RecoveryAuthRequest $request, RecoveryAuthAction $action)
    {
        $this->authorizeToken(self::RECOVERY);
        $dto = new RecoveryAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Confirm user on Auth Service.
     *
     * @OA\Post(
     *     path="/auth/confirm",
     *     operationId="confirmAuth",
     *     tags={"Auth"},
     *     summary="Confirm user on Auth Service",
     *     description="Returns auth status",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ConfirmAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/AuthResponseDto")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function confirm(ConfirmAuthRequest $request, ConfirmAuthAction $action)
    {
        $this->authorizeToken(self::CONFIRM);
        $dto = new ConfirmAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Force login exists user on Auth Service.
     *
     * @OA\Post(
     *     path="/auth/login",
     *     operationId="loginAuth",
     *     tags={"Auth"},
     *     summary="Login exists user in Auth Service",
     *     description="Login exists user in Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CheckAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/TokenAuthResponseDto")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function login(CheckAuthRequest $request, LoginAuthAction $action)
    {
        $this->authorizeToken(self::LOGIN);
        $dto = new CheckAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Force logout exists user on Auth Service.
     *
     * @OA\Post(
     *     path="/auth/logout",
     *     operationId="logoutAuth",
     *     tags={"Auth"},
     *     summary="Force logout exists user on Auth Service",
     *     description="Returns auth status",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LogoutAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/AuthResponseDto")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function logout(LogoutAuthRequest $request, LogoutAuthAction $action)
    {
        $this->authorizeToken(self::LOGOUT);
        $dto = new LogoutAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Force logout exists user on Auth Service.
     *
     * @OA\Post(
     *     path="/auth/user",
     *     operationId="userAuth",
     *     tags={"Auth"},
     *     summary="Force logout exists user on Auth Service",
     *     description="Returns user",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/UserAuthResponseDto"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ValidationException
     * @throws ApiLogicalException
     */
    public function user(UserAuthRequest $request, UserAuthAction $action)
    {
        $this->authorizeToken(self::USER);
        $dto = new UserAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     *
     * Fetch User Data by auth token from Auth Service.
     *
     * @OA\Post (
     *     path="/auth/fetch-user",
     *     operationId="fetchUserAuth",
     *     tags={"Auth"},
     *     summary="Fetch User Data by auth token from Auth Service",
     *     description="Returns users data from Auth Service, fetched by auth token",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/FetchUserAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/AuthResponseDto")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="bool",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="false",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(),
     *             ),
     *         ),
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ApiLogicalException
     * @throws ValidationException
     */
    public function fetchUser(FetchUserAuthRequest $request, FetchUserAuthAction $action)
    {
        $this->authorizeToken(self::FETCH_USER);
        $dto = new FetchUserAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->fetchUserResponseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
