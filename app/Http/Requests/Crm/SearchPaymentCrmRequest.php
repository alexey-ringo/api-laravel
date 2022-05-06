<?php

namespace App\Http\Requests\Crm;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SearchPaymentCrmRequest
 * @package App\Http\Requests\Crm
 *
 * @OA\Schema(
 *     title="SearchPaymentCrmRequest",
 *     description="SearchPaymentCrmRequest",
 *     type="object",
 *     @OA\Property(
 *         property="filters",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="aggregates",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="page",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="perPage",
 *         type="integer",
 *         example="10",
 *     ),
 *     @OA\Property(
 *         property="additional",
 *         type="boolean",
 *         example="true",
 *     ),
 * )
 *
 */
class SearchPaymentCrmRequest extends FormRequest
{
    public function rules()
    {
        return [
            'filters' => 'nullable|array',
            'aggregates' => 'nullable|integer',
            'page' => 'nullable|integer',
            'perPage' => 'nullable|integer',
            'additional' => 'sometimes|boolean',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
