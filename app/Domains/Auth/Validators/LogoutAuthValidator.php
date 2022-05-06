<?php

namespace App\Domains\Auth\Validators;

use App\Contracts\Validation\ValidatorCreator;
use Illuminate\Support\Facades\Validator;

class LogoutAuthValidator implements ValidatorCreator
{
    public static function create(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make(
            $data,
            [
                'user_id' => 'required|integer'
            ],
            [
            ]
        );
    }
}
