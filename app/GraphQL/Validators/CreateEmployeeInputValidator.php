<?php

declare(strict_types=1);

namespace App\GraphQL\Validators;

use Nuwave\Lighthouse\Validation\Validator;

final class CreateEmployeeInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'max:255',
            ],
            'last_name' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'unique:employees,email'
            ],
            'phone' => [
                'required',
                'max:15',
            ],
            'address' => [
                'required',
                'max:255',
            ],
            'salary' => [
                'required',
                'numeric',
                'regex:/^\d{1,8}(\.\d{0,2})?$/'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'salary.regex' => 'Salary must be maximum 8 digits and 2 decimal places.',
        ];
    }
}
