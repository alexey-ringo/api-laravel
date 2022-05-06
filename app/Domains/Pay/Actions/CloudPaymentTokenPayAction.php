<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Auth\Dto\FetchUserAuthRequestDto;
use App\Domains\Auth\Tasks\FetchUserAuthTask;
use App\Domains\Pay\Dto\Request\CloudPaymentTokenPayRequestDto;
use App\Domains\Pay\Tasks\CloudPaymentTokenPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;

class CloudPaymentTokenPayAction
{
    /**
     * @var CloudPaymentTokenPayTask
     */
    private CloudPaymentTokenPayTask $cloudPaymentTokenPayTask;

    /**
     * @var FetchUserAuthTask
     */
    private FetchUserAuthTask $fetchUserAuthTask;

    /**
     * CloudPaymentTokenPayAction constructor.
     * @param CloudPaymentTokenPayTask $cloudPaymentTokenPayTask
     * @param FetchUserAuthTask $fetchUserAuthTask
     */
    public function __construct(CloudPaymentTokenPayTask $cloudPaymentTokenPayTask, FetchUserAuthTask $fetchUserAuthTask)
    {
        $this->cloudPaymentTokenPayTask = $cloudPaymentTokenPayTask;
        $this->fetchUserAuthTask = $fetchUserAuthTask;
    }

    /**
     * @throws ValidationException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(CloudPaymentTokenPayRequestDto $dto): ResourceResponseDto
    {
        $fetchUserRequestDto = new FetchUserAuthRequestDto(token: $dto->token);
        $userResourceResponseDto = $this->fetchUserAuthTask->run($fetchUserRequestDto);
        $dto->user_id = $userResourceResponseDto->fetchUserResponseDto->id;
        $dto->email = $userResourceResponseDto->fetchUserResponseDto->email;
        $dto->token = '';

        return $this->cloudPaymentTokenPayTask->run($dto);
    }
}
