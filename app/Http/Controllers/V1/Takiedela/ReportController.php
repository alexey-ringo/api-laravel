<?php

namespace App\Http\Controllers\V1\Takiedela;

use App\Domains\Takiedela\Actions\GetDonateReportsTakiedelaAction;
use App\Domains\Takiedela\Actions\SetDonateReportTakiedelaAction;
use App\Domains\Takiedela\Dto\Base\BaseTakiedelaRequestDto;
use App\Domains\Takiedela\Dto\Request\SetDonateReportTakiedelaRequestDto;
use App\Exceptions\ApiLogicalException;
use App\Http\Controllers\V1\Controller;
use App\Http\Requests\Takiedela\SetDonateReportTakiedelaRequest;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\NoWrapResource;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ReportController extends Controller
{
    /**
     * @OA\Get(
     *     path="/takiedela/reports/donate",
     *     tags={"Takiedela"},
     *     summary="Get Monthly donate reports collection from Takiedela.",
     *     description="Get Monthly donate reports collection from Takiedela.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/GetDonateReportsTakiedelaResponseDataDto"),
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
     * @return JsonResponse|object
     * @throws ApiLogicalException
     * @throws UnknownProperties
     */
    public function getDonateReports(GetDonateReportsTakiedelaAction $action)
    {
        $this->authorizeToken(self::TAKIEDELA_GET_DONATE_REPORTS);
        $dto = new BaseTakiedelaRequestDto();
        $resourceCollectionDto = $action->run($dto);

        return DefaultResource::collection($resourceCollectionDto->collectionDto)
            ->response()->setStatusCode($resourceCollectionDto->statusCode);
    }

    /**
     * @OA\Post(
     *     path="/takiedela/report/donate",
     *     tags={"Takiedela"},
     *     summary="Set Monthly donate report from Takiedela.",
     *     description="Set Monthly donate report from Takiedela.",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/SetDonateReportTakiedelaRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/SetDonateReportTakiedelaResponseDto"),
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
     * @return JsonResponse|object
     * @throws ApiLogicalException
     * @throws UnknownProperties
     */
    public function setDonateReport(SetDonateReportTakiedelaRequest $request, SetDonateReportTakiedelaAction $action)
    {
        $this->authorizeToken(self::TAKIEDELA_SET_DONATE_REPORT);
        $dto = new SetDonateReportTakiedelaRequestDto($request->validated());
        $resourceResponseDto = $action->run($dto);

        return (new NoWrapResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
