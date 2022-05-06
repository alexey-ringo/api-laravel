<?php

namespace App\Http\Controllers\V1\Crm;

use App\Domains\Crm\Actions\FilestorageCrmAction;
use App\Domains\Crm\Dto\Request\FilestorageCrmRequestDto;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Crm\FilestorageCrmRequest;
use App\Http\Resources\DefaultResource;

class CrmController extends Controller
{
    const FILESTORAGE = 'crm-store-filestorage';

    /**
     * @OA\Post(
     *     path="/crm/filestorage",
     *     tags={"Crm"},
     *     summary="Get all Funds from Sluchaem.",
     *     description="Returns Funds data",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/FilestorageCrmRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/FilestorageCrmResponseDto")
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
    public function filestorage(FilestorageCrmRequest $request, FilestorageCrmAction $action)
    {
        $this->authorizeToken(self::FILESTORAGE);
        $dto = new FilestorageCrmRequestDto($request->validated());
        $resourceCollectionDto = $action->run($dto);

        return (new DefaultResource($resourceCollectionDto->collectionDto))->response()->setStatusCode($resourceCollectionDto->statusCode);
    }
}
