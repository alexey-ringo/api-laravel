<?php

namespace App\Http\Controllers\V1\Edu;

use App\Domains\Edu\Actions\IndexUsersTeachersEduAction;
use App\Domains\Edu\Dto\Request\IndexUsersTeachersEduRequestDto;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Edu\IndexUsersTeachersEduRequest;
use App\Http\Resources\DefaultResource;

class UsersController extends Controller
{
    /**
     * List all users Teachers from EDU service
     *
     * @OA\Get(
     *     path="/edu/users/teachers",
     *     tags={"Edu"},
     *     summary="List all users Teachers from EDU service",
     *     description="List all users Teachers from EDU service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="string"),
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/UsersTeachersEduResponseDataDto"),
     *             ),
     *             @OA\Property(
     *                 property="total",
     *                 type="integer",
     *                 example="34",
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="You do not have permissions to join this game!",
     *             ),
     *         ),
     *     ),
     * )
     *
     *
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \App\Exceptions\ApiLogicalException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function indexUsersTeachers(IndexUsersTeachersEduRequest $request, IndexUsersTeachersEduAction $action)
    {
        $this->authorizeToken(self::EDU_USERS_INDEX_USERS_TEACHERS);
        $dto = new IndexUsersTeachersEduRequestDto($request->validated());
        $resourceCollectionDto = $action->run($dto);

        return DefaultResource::collection($resourceCollectionDto->collectionDto)
            ->additional(['total' => $resourceCollectionDto->total])
            ->response()->setStatusCode($resourceCollectionDto->statusCode);
    }
}
