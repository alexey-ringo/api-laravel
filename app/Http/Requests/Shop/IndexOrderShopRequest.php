<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndexOrderShopRequest
 * @package App\Http\Requests\Shop
 *
 * @OA\Schema(
 *     title="IndexOrderShopRequest",
 *     description="IndexOrderShopRequest",
 *     type="object",
 *     required={"id"},
 *     @OA\Property(
 *         property="limit",
 *         type="integer",
 *         example="10",
 *     ),
 *     @OA\Property(
 *         property="offset",
 *         type="integer",
 *         example="0",
 *     )
 * )
 *
 */
class IndexOrderShopRequest extends FormRequest
{
    public function rules()
    {
        return [
            'limit' => 'nullable|integer',
            'offset' => 'nullable|integer',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
