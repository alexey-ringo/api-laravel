<?php

namespace App\Domains\Auth\Validators;

use App\Contracts\Validation\ValidatorCreator;
use Illuminate\Support\Facades\Validator;

class RegisterAuthValidator implements ValidatorCreator
{
    public static function create(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make(
            $data,
            [
                'email' => [
                    'bail',
                    'string_or_array',
                ],

                'password' => [
                    'nullable',
                ],

                'phone' => [
                    'nullable',
                ],

                'firstname' => [
                    'nullable',
                    'string',
                ],

                'patronymic' => [
                    'nullable',
                    'string',
                ],

                'lastname' => [
                    'nullable',
                    'string',
                ],

                'notification' => [
                    'nullable',
                    'array'
                ],

                'notification.template' => [
                    'required_with:notification',
                    'integer',
                ],

                'notification.snippets' => [
                    'nullable',
                    'array',
                ],

                'referer' => [
                    'nullable',
                    'url',
                ],

                'login' => [
                    'nullable',
                    'boolean'
                ],

                'users' => [
                    'nullable',
                    'array'
                ],

                'users.*.email' => [
                    'required_with:users',
                    'bail',
                    'email',
                    'max:255',
                ],

                'users.*.password' => [
                    'nullable',
                ],

                'users.*.notification' => [
                    'nullable',
                    'array'
                ],

                'users.*.notification.template' => [
                    'required_with:users.notification',
                    'integer',
                    'min:1',
                ],

                'users.*.notification.snippets' => [
                    'nullable',
                    'array',
                ],

                'users.*.referer' => [
                    'nullable',
                    'url',
                ],
            ],
            [
            ]
        );
    }
}
