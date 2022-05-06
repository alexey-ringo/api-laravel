<?php

namespace App\Http\Controllers\V1\Auth;

use App\Domains\Auth\Actions\LoginEmailCodeAuthAction;
use App\Domains\Auth\Actions\LoginPhoneCodeAuthAction;
use App\Domains\Auth\Actions\SendCodeAuthAction;
use App\Domains\Auth\Actions\SendCodeNoDelayAuthAction;
use App\Domains\Auth\Actions\SendEmailCodeAuthAction;
use App\Domains\Auth\Actions\SendPhoneCodeAuthAction;
use App\Domains\Auth\Dto\Request\CodeEmailAuthRequestDto;
use App\Domains\Auth\Dto\Request\CodePhoneAuthRequestDto;
use App\Domains\Auth\Dto\Request\EmailAuthRequestDto;
use App\Domains\Auth\Dto\Request\PhoneAuthRequestDto;
use App\Domains\Auth\Dto\Request\SendCodeAuthRequestDto;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Auth\CodeEmailAuthRequest;
use App\Http\Requests\Auth\CodePhoneAuthRequest;
use App\Http\Requests\Auth\EmailAuthRequest;
use App\Http\Requests\Auth\PhoneAuthRequest;
use App\Http\Requests\Auth\SendCodeRequest;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\NoWrapResource;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CodeController extends Controller
{
    /**
     * Send verification code to Auth Service.
     *
     * @OA\Post(
     *     path="/auth/code",
     *     operationId="sendCodeAuth",
     *     tags={"Auth"},
     *     summary="Send verification code to Auth Service",
     *     description="Send verification code to Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/SendCodeRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="true",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(
     *                     property="code",
     *                     type="integer",
     *                     example="1234",
     *                ),
     *             ),
     *         ),
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
     * @throws ApiPermissionDeniedException
     */
    public function sendCode(SendCodeRequest $request, SendCodeAuthAction $action)
    {
        $this->authorizeToken(self::AUTH_CODE_SEND_CODE);
        $dto = new SendCodeAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Send verification code to Auth Service without any delay.
     *
     * @OA\Post(
     *     path="/auth/code-no-delay",
     *     operationId="sendCodeAuth",
     *     tags={"Auth"},
     *     summary="Send verification code to Auth Service without any delay",
     *     description="Send verification code to Auth Service without any delay",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/SendCodeRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="boolean",
     *                 example="true",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(
     *                     property="code",
     *                     type="integer",
     *                     example="1234",
     *                ),
     *             ),
     *         ),
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
     * @throws ApiPermissionDeniedException
     */
    public function sendCodeNoDelay(SendCodeRequest $request, SendCodeNoDelayAuthAction $action)
    {
        $this->authorizeToken(self::AUTH_CODE_SEND_CODE_NO_DELAY);
        $dto = new SendCodeAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Send auth code to email.
     *
     * @OA\Post(
     *     path="/auth/code/email/send",
     *     operationId="sendEmailCodeAuth",
     *     tags={"Auth"},
     *     summary="Send auth code to email",
     *     description="Send auth code to email",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/EmailAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/StatusBoolResponseDto"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function sendEmailCode(EmailAuthRequest $request, SendEmailCodeAuthAction $action)
    {
        $this->authorizeToken(self::AUTH_CODE_SEND_EMAIL_CODE);
        $dto = new EmailAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Send auth code to phone.
     *
     * @OA\Post(
     *     path="/auth/code/phone/send",
     *     operationId="sendPhoneCodeAuth",
     *     tags={"Auth"},
     *     summary="Send auth code to phone",
     *     description="Send auth code to phone",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PhoneAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/StatusBoolResponseDto"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function sendPhoneCode(PhoneAuthRequest $request, SendPhoneCodeAuthAction $action)
    {
        $this->authorizeToken(self::AUTH_CODE_SEND_PHONE_CODE);
        $dto = new PhoneAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Login and get access_token with email code.
     *
     * @OA\Post(
     *     path="/auth/code/email/login/cookie",
     *     operationId="loginWithEmailCodeSetCookieAuth",
     *     tags={"Auth"},
     *     summary="Login and get access_token with email code",
     *     description="Login and get access_token with email code",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CodeEmailAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/LoginCodeAuthResponseDto"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function loginWithEmailCodeSetCookie(CodeEmailAuthRequest $request, LoginEmailCodeAuthAction $action)
    {
        $this->authorizeToken(self::AUTH_CODE_LOGIN_WITH_EMAIL_CODE);
        $dto = new CodeEmailAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Login and get access_token with phone code.
     *
     * @OA\Post(
     *     path="/auth/code/phone/login/cookie",
     *     operationId="loginWithPhoneCodeSetCookieAuth",
     *     tags={"Auth"},
     *     summary="Login and get access_token with phone code",
     *     description="Login and get access_token with phone code",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CodePhoneAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/LoginCodeAuthResponseDto"),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden"
     *     )
     * )
     *
     * @throws UnknownProperties
     * @throws ApiPermissionDeniedException
     */
    public function loginWithPhoneCodeSetCookie(CodePhoneAuthRequest $request, LoginPhoneCodeAuthAction $action)
    {
        $this->authorizeToken(self::AUTH_CODE_LOGIN_WITH_PHONE_CODE);
        $dto = new CodePhoneAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto->toArrayNoGaps()))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
