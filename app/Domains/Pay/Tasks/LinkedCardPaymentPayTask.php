<?php

namespace App\Domains\Pay\Tasks;

use App\Domains\Pay\Dto\Response\CollectionDto\LinkedCardCollectionPayResponseDto;
use App\Domains\Pay\Tasks\Base\AbstractResourcePayTask;
use App\Parents\Tasks\AbstractTask;

class LinkedCardPaymentPayTask extends AbstractResourcePayTask
{
    protected string $apiPath = '/cards/list';

    protected array $addParams = [
        'message' => 'message',
        'status' => 'status'
    ];

    protected string $httpType = AbstractTask::POST_TYPE;

    protected string $responseDtoClassName = LinkedCardCollectionPayResponseDto::class;

//    /**
//     * @throws UnknownProperties
//     * @throws ApiLogicalException
//     * @throws \Illuminate\Validation\ValidationException
//     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
//     */
//    public function run(int $userId): ResourceResponseDto
//    {
//        $this->response = Http::withBasicAuth($this->username, $this->password)->withOptions($this->options)
//            ->post($this->baseUri . $this->apiPath, ['user_id' => (string)$userId]);
//
//        $responseJson = $this->response->json();
//
//        if ($this->response->successful() && (! isset($responseJson) || ! isset($responseJson['status']) || ! isset($responseJson['message']))) {
//            throw new ApiLogicalException('Missing or incorrect response format from remote service '
//                . $this->baseUri . $this->apiPath . ' !', 500);
//        }
//        $this->responseFailed();
//
//        $responseDataDto = Collect([]);
//        $message = null;
//        if (is_array($responseJson['message'])) {
//            $responseDataDto = collect($responseJson['message'])->map(function ($item) {
//                return new LinkedCardsPayResponseDataDto($item);
//            });
//        } else {
//            $message = $responseJson['message'];
//        }
//
//        $responseDto = new LinkedCardsPayResponseDto(status: $responseJson['status'], message: $message, data: $responseDataDto);
//
//        return new ResourceResponseDto(responseDto: $responseDto, statusCode: $this->response->status());
//    }
}
