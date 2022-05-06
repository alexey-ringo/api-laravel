<?php

namespace App\Domains\Crm\Tasks;

use App\Domains\Crm\Dto\Response\ResponseDto\StoreVirtualAccountCrmResponseDto;
use App\Domains\Crm\Tasks\Base\AbstractResourceCrmTask;
use App\Parents\Tasks\AbstractTask;

class StoreVirtualAccountCrmTask extends AbstractResourceCrmTask
{
    protected string $contentArrayName = 'data';
    protected string $apiPath = '/virtual-accounts';
    protected string $responseDtoClassName = StoreVirtualAccountCrmResponseDto::class;
    protected string $httpType = AbstractTask::POST_TYPE;
//
//    /**
//     * @throws UnknownProperties
//     * @throws ApiLogicalException
//     * @throws ValidationException
//     */
//    public function run(StoreVirtualAccountCrmRequestDto $dto): ResourceResponseDto
//    {
//
//        $this->response = Http::withOptions($this->options)
//            ->post($this->baseUri . $this->apiPath, $dto->toArrayNoGaps());
//
//        $responseJson = $this->response->json();
//
//        if ($this->response->successful() && (! isset($responseJson) || ! isset($responseJson['data'])
//                || ! is_array($responseJson['data']))) {
//            throw new ApiLogicalException('Missing or incorrect response format from remote service!', 500);
//        }
//        $this->responseFailed();
//
//        $responseJson['data']['type'] = new TypeVirtualAccountDto($responseJson['data']['type']);
//        $responseJson['data']['case'] = (isset($responseJson['data']['case']) && ! empty($responseJson['data']['case']))
//            ? new CaseVirtualAccountDto($responseJson['data']['case']) : null;
//        $responseJson['data']['fund'] = new FundVirtualAccountDto($responseJson['data']['fund']);
//
//        $responseDataDto = new StoreVirtualAccountCrmResponseDto($responseJson['data']);
//
//        return new ResourceResponseDto(responseDto: $responseDataDto, statusCode: $this->response->status());
//    }
}
