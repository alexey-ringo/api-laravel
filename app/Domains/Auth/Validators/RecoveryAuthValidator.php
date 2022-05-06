<?php

namespace App\Domains\Auth\Validators;

use App\Contracts\Validation\ValidatorCreator;
use Illuminate\Support\Facades\Validator;

class RecoveryAuthValidator implements ValidatorCreator
{
    public static function create(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make(
            $data,
            [
                'email' => 'required|string|max:100'
            ],
            [
            ]
        );
    }
}
