<?php

namespace App\Http\Controllers\V1\Auth;

use App\Domains\Auth\Actions\DeleteUserSocialIdAuthAction;
use App\Domains\Auth\Actions\ListUsersByIdsAction;
use App\Domains\Auth\Actions\ShowAuthTokenByUserAction;
use App\Domains\Auth\Actions\ShowUserAuthAction;
use App\Domains\Auth\Actions\ShowUserBySocialIdAuthAction;
use App\Domains\Auth\Actions\StoreUserAuthAction;
use App\Domains\Auth\Actions\StoreUserSocialIdAuthAction;
use App\Domains\Auth\Actions\UpdateUserAuthAuthAction;
use App\Domains\Auth\Actions\UpdateUserMetaAuthAction;
use App\Domains\Auth\Dto\Request\DeleteUserSocialIdAuthRequestDto;
use App\Domains\Auth\Dto\Request\ListUsersByIdsRequestDto;
use App\Domains\Auth\Dto\Request\ShowUserAuthRequestDto;
use App\Domains\Auth\Dto\Request\ShowUserBySocialIdAuthRequestDto;
use App\Domains\Auth\Dto\Request\StoreUserAuthRequestDto;
use App\Domains\Auth\Dto\Request\StoreUserSocialIdAuthRequestDto;
use App\Domains\Auth\Dto\Request\UpdateUserAuthAuthRequestDto;
use App\Domains\Auth\Dto\Request\UpdateUserMetaAuthRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Exceptions\ApiPermissionDeniedException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Auth\DeleteUserSocialIdAuthRequest;
use App\Http\Requests\Auth\ListUsersByIdsAuthRequest;
use App\Http\Requests\Auth\ShowUserAuthRequest;
use App\Http\Requests\Auth\ShowUserBySocialIdAuthRequest;
use App\Http\Requests\Auth\StoreUserAuthRequest;
use App\Http\Requests\Auth\StoreUserSocialIdAuthRequest;
use App\Http\Requests\Auth\UpdateUserAuthAuthRequest;
use App\Http\Requests\Auth\UpdateUserMetaAuthRequest;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\NoWrapResource;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UserController extends Controller
{
    const STORE = 'auth-user-store';
    const STORE_NEW_SOCIAL_ID = 'auth-user-store-new_social_id';
    const UPDATE_META = 'auth-user-update-meta';
    const UPDATE_AUTH = 'auth-user-update-auth';
    const SHOW = 'auth-user-show';
    const SHOW_BY_SOCIAL = 'auth-user-show_by_social';
    const SHOW_AUTH_TOKEN_BY_USER = 'auth-user-show_auth_token_by_user';
    const DELETE_NEW_SOCIAL_ID = 'auth-user-delete-new_social_id';

    /**
     * Store new User with social identifier on Auth Service.
     *
     * @OA\Post(
     *     path="/auth/user/store",
     *     operationId="storeUserAuth",
     *     tags={"Auth"},
     *     summary="Store new User with social identifier on Auth Service",
     *     description="Store new User with social identifier on Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreUserAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/UserAuthResponseDto")
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
     * @throws ApiLogicalException
     */
    public function store(StoreUserAuthRequest $request, StoreUserAuthAction $action)
    {
        $this->authorizeToken(self::STORE);
        $dto = new StoreUserAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Store new Social inentifier for exists User on Auth Service.
     *
     * @OA\Post(
     *     path="/auth/user/update/{id}/store/social",
     *     operationId="storeUserSocialAuth",
     *     tags={"Auth"},
     *     summary="Store new Social inentifier for exists User on Auth Service",
     *     description="Store new Social inentifier for exists User on Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreUserSocialIdAuthRequest")
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
     * @throws ApiLogicalException
     */
    public function storeSocialId(StoreUserSocialIdAuthRequest $request, int $id, StoreUserSocialIdAuthAction $action)
    {
        $this->authorizeToken(self::STORE_NEW_SOCIAL_ID);
        $dto = new StoreUserSocialIdAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto, $id);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Update exists User Metadata on Auth Service.
     *
     * @OA\Post(
     *     path="/auth/user/update/{id}/meta",
     *     operationId="updateUserMetadataAuth",
     *     tags={"Auth"},
     *     summary="Update exists User Metadata on Auth Service",
     *     description="Update exists User Metadata on Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateUserMetaAuthRequest")
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
     * @throws ApiLogicalException
     */
    public function updateMeta(UpdateUserMetaAuthRequest $request, int $id, UpdateUserMetaAuthAction $action)
    {
        $this->authorizeToken(self::UPDATE_META);
        $dto = new UpdateUserMetaAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto, $id);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Update exists User Authorization data on Auth Service.
     *
     * @OA\Post(
     *     path="/auth/user/update/{id}/auth",
     *     operationId="updateUserAuthAuth",
     *     tags={"Auth"},
     *     summary="Update exists User Authorization data on Auth Service",
     *     description="Update exists User Authorization data on Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateUserAuthAuthRequest")
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
    public function updateAuth(UpdateUserAuthAuthRequest $request, int $id, UpdateUserAuthAuthAction $action)
    {
        $this->authorizeToken(self::UPDATE_AUTH);
        $dto = new UpdateUserAuthAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto, $id);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Show exists User Model in Auth Service by Email or ID.
     *
     * @OA\Post(
     *     path="/auth/user/show",
     *     operationId="showUserAuth",
     *     tags={"Auth"},
     *     summary="Show exists User Model in Auth Service by Email or ID",
     *     description="Show exists User Model in Auth Service by Email or ID",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ShowUserAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/UserAuthResponseDto")
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
    public function show(ShowUserAuthRequest $request, ShowUserAuthAction $action)
    {
        $this->authorizeToken(self::SHOW);
        $dto = new ShowUserAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Show exists User Model in Auth Service by User Social Token in Messengers.
     *
     * @OA\Post(
     *     path="/auth/user/show/social",
     *     operationId="showUserAuth",
     *     tags={"Auth"},
     *     summary="Show exists User Model in Auth Service by User Social Token in Messengers",
     *     description="Show exists User Model in Auth Service by User Social Token in Messengers",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ShowUserBySocialIdAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/UserAuthResponseDto")
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
    public function showBySocialId(ShowUserBySocialIdAuthRequest $request, ShowUserBySocialIdAuthAction $action)
    {
        $this->authorizeToken(self::SHOW_BY_SOCIAL);
        $dto = new ShowUserBySocialIdAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Show Auth JWT Token by User ID or Email from Auth Service.
     *
     * @OA\Post(
     *     path="/auth/user/show/token",
     *     operationId="loginAuth",
     *     tags={"Auth"},
     *     summary="Show Auth JWT Token by User ID or Email from Auth Service",
     *     description="Show Auth JWT Token by User ID or Email from Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ShowUserAuthRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 example="true",
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(
     *                     property="token_type",
     *                     type="string",
     *                     example="Bearer",
     *                     ),
     *                     @OA\Property(
     *                         property="expires_in",
     *                         type="integer",
     *                         example="2592000",
     *                     ),
     *                     @OA\Property(
     *                         property="access_token",
     *                         type="string",
     *                         example="PkK7e9ZIIXVbRwLvDVkOBbIYDkk35uQfF6-8KOhQEJg4IWh-U3XsyqW8sEfLprQWHSBz25s9lM8mi5dJ6lA",
     *                     ),
     *                     @OA\Property(
     *                         property="refresh_token",
     *                         type="string",
     *                         example="7ecc61b6981281ad14efc2387e2773d9f394eb0b1dcda5fdc67ba3f2ffe1c9b8a522b675e63069f697470e",
     *                     ),
     *                 ),
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
     * @throws ApiLogicalException|ValidationException
     */
    public function showAuthTokenByUser(ShowUserAuthRequest $request, ShowAuthTokenByUserAction $action)
    {
        $this->authorizeToken(self::SHOW_AUTH_TOKEN_BY_USER);
        $dto = new ShowUserAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Delete Social inentifier for exists User on Auth Service.
     *
     * @OA\Post(
     *     path="/auth/user/update/{id}/delete/social",
     *     operationId="deleteUserSocialAuth",
     *     tags={"Auth"},
     *     summary="Delete Social inentifier for exists User on Auth Service",
     *     description="Delete Social inentifier for exists User on Auth Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/DeleteUserSocialIdAuthRequest")
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
     * @throws ApiLogicalException
     */
    public function deleteSocialId(DeleteUserSocialIdAuthRequest $request, int $id, DeleteUserSocialIdAuthAction $action)
    {
        $this->authorizeToken(self::DELETE_NEW_SOCIAL_ID);
        $dto = new DeleteUserSocialIdAuthRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto, $id);

        return (new DefaultResource($resourceResponseDto->responseDto))
            ->response()->setStatusCode($resourceResponseDto->statusCode);
    }

    /**
     * Payments collection Data for Office from Payment Gateway.
     *
     * @OA\Get(
     *     path="/auth/users/list-by-ids",
     *     operationId="listUsersByIds",
     *     tags={"Office"},
     *     summary="User Payments collection for Office from Payment Gateway",
     *     description="User Payments collection for Office from Payment Gateway",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="user_id",
     *          description="User id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/PaymentCollectionPayResponseDto"),
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
    public function listUsersByIds(ListUsersByIdsAuthRequest $request, ListUsersByIdsAction $action)
    {
        $this->authorizeToken(self::AUTH_USER_LIST_USERS_BY_IDS);
        $dto = new ListUsersByIdsRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);
        //TODO: Передалеть на нормальную коллекцию
        //        return (new NoWrapResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);

        return response()->json($resourceResponseDto->responseDto->toArrayNoGaps(), $resourceResponseDto->statusCode);
    }
}
