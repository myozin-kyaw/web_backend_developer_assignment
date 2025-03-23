<?php

declare(strict_types=1);

namespace App\GraphQL\Validators;

use Nuwave\Lighthouse\Validation\Validator;

final class LoginPayloadValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'username' => [
                'required',
            ],
            'password' => [
                'required',
            ]
        ];
    }
}
