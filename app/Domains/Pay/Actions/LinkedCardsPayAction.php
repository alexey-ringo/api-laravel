<?php

namespace App\Domains\Pay\Actions;

use App\Domains\Auth\Dto\FetchUserAuthRequestDto;
use App\Domains\Auth\Tasks\FetchUserAuthTask;
use App\Domains\Pay\Dto\Request\LinkedCardByIdPayRequestDto;
use App\Domains\Pay\Tasks\LinkedCardPaymentPayTask;
use App\Parents\Dto\Response\ResourceResponseDto;
use Illuminate\Validation\ValidationException;

class LinkedCardsPayAction
{
    /**
     * @var LinkedCardPaymentPayTask
     */
    private LinkedCardPaymentPayTask $linkedCardPayTask;

    /**
     * @var FetchUserAuthTask
     */
    private FetchUserAuthTask $fetchUserAuthTask;

    /**
     * LinkedCardsPayAction constructor.
     * @param LinkedCardPaymentPayTask $linkedCardPayTask
     * @param FetchUserAuthTask $fetchUserAuthTask
     */
    public function __construct(LinkedCardPaymentPayTask $linkedCardPayTask, FetchUserAuthTask $fetchUserAuthTask)
    {
        $this->linkedCardPayTask = $linkedCardPayTask;
        $this->fetchUserAuthTask = $fetchUserAuthTask;
    }

    /**
     * @throws ValidationException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function run(FetchUserAuthRequestDto $requestDto): ResourceResponseDto
    {
        $fetchedUserResourceResponseDto = $this->fetchUserAuthTask->run($requestDto);
        $linkedCardDto = new LinkedCardByIdPayRequestDto(user_id: $fetchedUserResourceResponseDto->fetchUserResponseDto->id);

        return $this->linkedCardPayTask->run($linkedCardDto);
    }
}
