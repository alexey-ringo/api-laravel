<?php

namespace App\Http\Requests\Tochnost;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SearchProblemsOrganizationsTochnostRequest
 * @package App\Http\Requests\Tochnost
 */
class SearchProblemsOrganizationsTochnostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'inns' => 'sometimes|array',
            'inn' => 'sometimes|string',
            'ogrn' => 'sometimes|string',
            'kpp' => 'sometimes|string',
            'full_name' => 'sometimes|string',
            'problems' => 'sometimes|array',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
