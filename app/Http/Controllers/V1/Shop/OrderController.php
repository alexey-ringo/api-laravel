<?php

namespace App\Http\Controllers\V1\Shop;

use App\Domains\Shop\Actions\CounterpartyOrderShopAction;
use App\Domains\Shop\Actions\UserOrderShopAction;
use App\Domains\Shop\Dto\Request\IndexOrderShopRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Shop\IndexOrderShopRequest;
use App\Http\Resources\DefaultResource;

class OrderController extends Controller
{
    const ORDERS_USER = 'shop-orders_user';
    const ORDERS_COUNTERPARTY = 'shop-orders_counterparty';

    /**
     * List all orders by user_id from Shop Service.
     *
     * @OA\Get(
     *     path="/shop/orders/user/{id}",
     *     operationId="listOrdersByUserId",
     *     tags={"Shop"},
     *     summary="List all orders by user_id from Shop Service",
     *     description="List all orders by user_id from Shop Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="offset",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/IndexOrderShopResponseDto"
     *             ),
     *             @OA\Property(
     *                 property="count",
     *                 type="integer",
     *                 example="1"
     *             ),
     *             @OA\Property(
     *                 property="success",
     *                 type="string",
     *                 example="Заказ обновлен"
     *             ),
     *         ),
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
     * @throws ApiLogicalException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function ordersUser(IndexOrderShopRequest $request, int $id, UserOrderShopAction $action)
    {
        $this->authorizeToken(self::ORDERS_USER);
        $dto = new IndexOrderShopRequestDto($request->validated());
        $resourceCollectionDto = $action->run($dto, $id);

        return DefaultResource::collection($resourceCollectionDto->collectionDto)
            ->additional(['count' => $resourceCollectionDto->count, 'success' => $resourceCollectionDto->success])
            ->response()->setStatusCode($resourceCollectionDto->statusCode);
    }

    /**
     * List all orders by Counterparty uuid from Shop Service.
     *
     * @OA\Get(
     *     path="/shop/orders/counterparty/{uuid}",
     *     operationId="listOrders",
     *     tags={"Shop"},
     *     summary="List all orders by Counterparty uuid from Shop Service",
     *     description="List all orders by Counterparty uuid from Shop Service",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="Counterparty uuid",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Parameter(
     *         name="offset",
     *         in="query",
     *         @OA\Schema(type="integer"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/IndexOrderShopResponseDto"
     *             ),
     *             @OA\Property(
     *                 property="count",
     *                 type="integer",
     *                 example="1"
     *             ),
     *             @OA\Property(
     *                 property="success",
     *                 type="string",
     *                 example="Заказ обновлен"
     *             ),
     *         ),
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
     * @throws ApiLogicalException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function ordersCounterparty(IndexOrderShopRequest $request, string $uuid, CounterpartyOrderShopAction $action)
    {
        $this->authorizeToken(self::ORDERS_COUNTERPARTY);
        $dto = new IndexOrderShopRequestDto($request->validated());
        $resourceCollectionDto = $action->run($dto, $uuid);

        return DefaultResource::collection($resourceCollectionDto->collectionDto)
            ->additional(['count' => $resourceCollectionDto->count, 'success' => $resourceCollectionDto->success])
            ->response()->setStatusCode($resourceCollectionDto->statusCode);
    }
}
