<?php

namespace App\Http\Controllers\V1\Crm;

use App\Domains\Crm\Actions\AnnualUserReportCrmAction;
use App\Domains\Crm\Dto\Base\BaseCrmRequestDto;
use App\Http\Controllers\V1\Controller;
use App\Http\Resources\DefaultResource;

class ReportController extends Controller
{
    /**
     * @OA\Get(
     *     path="/crm/reports/annual-user-report/{uuid}",
     *     tags={"Crm"},
     *     summary="Get Annual User Report fron CRM by uuid",
     *     description="Get Annual User Report fron CRM by uuid",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *          name="uuid",
     *          description="Counterparty uuid",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 ref="#/components/schemas/AnnualUserReportCrmResponseDataDto",
     *             ),
     *         ),
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
    public function annualUserReport(string $uuid, AnnualUserReportCrmAction $action)
    {
        $this->authorizeToken(self::CRM_REPORT_ANNUAL_USER_REPORT);
        //Заглушка для сохранения единого интерфейса абстрактоной CRM Task
        $dto = new BaseCrmRequestDto;
        $resourceResponseDto = $action->run($dto, $uuid);

        return (new DefaultResource($resourceResponseDto->responseDto))->response()->setStatusCode($resourceResponseDto->statusCode);
    }
}
