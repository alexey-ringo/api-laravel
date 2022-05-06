<?php

namespace App\Domains\Auth\Validators;

use App\Contracts\Validation\ValidatorCreator;
use Illuminate\Support\Facades\Validator;

class UserAuthValidator implements ValidatorCreator
{
    public static function create(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make(
            $data,
            [
                'id' => [
                    'required_without:email',
                    'integer',
                ],
                'email' => [
                    'required_without:id',
                    'email',
                ]
            ],
            [
            ]
        );
    }
}
