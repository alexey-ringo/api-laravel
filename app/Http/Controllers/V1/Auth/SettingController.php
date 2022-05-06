<?php

namespace App\Http\Controllers\V1\Auth;

use App\Domains\Auth\Actions\ChangeEmailSettingAuthAction;
use App\Domains\Auth\Actions\ChangePasswordSettingAuthAction;
use App\Domains\Auth\Actions\ChangePhoneSettingAuthAction;
use App\Domains\Auth\Actions\CheckPasswordSettingAuthAction;
use App\Domains\Auth\Actions\ConfirmPhoneSettingAuthAction;
use App\Domains\Auth\Actions\UpdateAllSettingAuthAction;
use App\Domains\Auth\Actions\UpdateMetaDataSettingAuthAction;
use App\Domains\Auth\Dto\Request\ChangeEmailSettingAuthRequestDto;
use App\Domains\Auth\Dto\Request\ChangePasswordSettingAuthRequestDto;
use App\Domains\Auth\Dto\Request\ChangePhoneSettingAuthRequestDto;
use App\Domains\Auth\Dto\Request\CheckPasswordSettingAuthRequestDto;
use App\Domains\Auth\Dto\Request\ConfirmPhoneSettingAuthRequestDto;
use App\Domains\Auth\Dto\Request\UpdateAllSettingRequestDto;
use App\Domains\Auth\Dto\Request\UpdateMetaDataSettingAuthRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Auth\ChangeEmailSettingAuthRequest;
use App\Http\Requests\Auth\ChangePasswordSettingAuthRequest;
use App\Http\Requests\Auth\ChangePhoneSettingAuthRequest;
use App\Http\Requests\Auth\CheckPasswordSettingAuthRequest;
use App\Http\Requests\Auth\ConfirmPhoneSettingAuthRequest;
use App\Http\Requests\Auth\UpdateAllSettingAuthRequest;
use App\Http\Requests\Auth\UpdateMetaDataSettingAuthRequest;
use App\Http\Resources\DefaultResource;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class SettingController extends Controller
{
    const UPDATE_USER_ALL_SETTING = 'auth-update_user_all-setting';
    const CHANGE_EMAIL_SETTING = 'auth-change_email-setting';
    const CHANGE_PHONE_SETTING = 'auth-change_phone-setting';
    const CONFIRM_PHONE_SETTING = 'auth-confirm_phone-setting';
    const UPDATE_USER_METADATA_SETTING = 'auth-update_user_metadata-setting';
    const CHECK_PASSWORD_SETTING = 'auth-check_password-setting';
    const CHANGE_PASSWORD_SETTING = 'auth-change_password-setting';

    /**
     * Update All User setting data on the Auth Service.
     *
     * @OA\Post(
     *     path="/auth/setting/update/all",
     *     operationId="checkAuth",
     *     tags={"Auth-Setting"},
     *     summary="Update All User setting data on the Auth Service",
     *     description="Update All User setting data on the Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateAllSettingAuthRequest")
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
     * @throws ApiLogicalException
     */
    public function updateAllSetting(UpdateAllSettingAuthRequest $request, UpdateAllSettingAuthAction $action)
    {
        $this->authorizeToken(self::UPDATE_USER_ALL_SETTING);
        $dto = new UpdateAllSettingRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Change User Email setting on the Auth Service.
     *
     * @OA\Post(
     *     path="/auth/setting/change/email",
     *     operationId="checkAuth",
     *     tags={"Auth-Setting"},
     *     summary="Change User Email setting on the Auth Service",
     *     description="Change User Email setting on the Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ChangeEmailSettingAuthRequest")
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
     * @throws ApiLogicalException
     */
    public function changeEmail(ChangeEmailSettingAuthRequest $request, ChangeEmailSettingAuthAction $action)
    {
        $this->authorizeToken(self::CHANGE_EMAIL_SETTING);
        $dto = new ChangeEmailSettingAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }
    /**
     * Change User Phone setting on the Auth Service.
     *
     * @OA\Post(
     *     path="/auth/setting/change/phone",
     *     operationId="checkAuth",
     *     tags={"Auth-Setting"},
     *     summary="Change User Email setting on the Auth Service",
     *     description="Change User Email setting on the Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ChangePhoneSettingAuthRequest")
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
     * @throws ApiLogicalException
     */
    public function changePhone(ChangePhoneSettingAuthRequest $request, ChangePhoneSettingAuthAction $action)
    {
        $this->authorizeToken(self::CHANGE_PHONE_SETTING);
        $dto = new ChangePhoneSettingAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Confirmation the change of User Phone setting on the Auth Service.
     *
     * @OA\Post(
     *     path="/auth/setting/confirm/phone",
     *     operationId="checkAuth",
     *     tags={"Auth-Setting"},
     *     summary="Confirmation the change of User Phone setting on the Auth Service",
     *     description="Confirmation the change of User Phone setting on the Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ChangeEmailSettingAuthRequest")
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
     * @throws ApiLogicalException
     */
    public function confirmPhone(ConfirmPhoneSettingAuthRequest $request, ConfirmPhoneSettingAuthAction $action)
    {
        $this->authorizeToken(self::CONFIRM_PHONE_SETTING);
        $dto = new ConfirmPhoneSettingAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Update User Metadata setting on the Auth Service.
     *
     * @OA\Post(
     *     path="/auth/setting/update/user",
     *     operationId="checkAuth",
     *     tags={"Auth-Setting"},
     *     summary="Update User Metadata setting on the Auth Service",
     *     description="Update User Metadata setting on the Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateMetaDataSettingAuthRequest")
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
     * @throws ApiLogicalException
     */
    public function updateMetaData(UpdateMetaDataSettingAuthRequest $request, UpdateMetaDataSettingAuthAction $action)
    {
        $this->authorizeToken(self::UPDATE_USER_METADATA_SETTING);
        $dto = new UpdateMetaDataSettingAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Verification current User password on the Auth Service.
     *
     * @OA\Post(
     *     path="/auth/setting/check/password",
     *     operationId="checkAuth",
     *     tags={"Auth-Setting"},
     *     summary="Verification current User password on the Auth Service",
     *     description="Verification current User password on the Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ChangeEmailSettingAuthRequest")
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
     * @throws ApiLogicalException
     */
    public function checkPassword(CheckPasswordSettingAuthRequest $request, CheckPasswordSettingAuthAction $action)
    {
        $this->authorizeToken(self::CHECK_PASSWORD_SETTING);
        $dto = new CheckPasswordSettingAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Change User password on the Auth Service.
     *
     * @OA\Post(
     *     path="/auth/setting/change/password",
     *     operationId="checkAuth",
     *     tags={"Auth-Setting"},
     *     summary="Change User password on the Auth Service",
     *     description="Change User password on the Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ChangePasswordSettingAuthRequest")
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
     * @throws ApiLogicalException
     */
    public function changePassword(ChangePasswordSettingAuthRequest $request, ChangePasswordSettingAuthAction $action)
    {
        $this->authorizeToken(self::CHANGE_PASSWORD_SETTING);
        $dto = new ChangePasswordSettingAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
