<?php

namespace App\Http\Requests\Crm;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FilestorageCrmRequest
 * @package App\Http\Requests\Crm
 *
 * @OA\Schema(
 *     title="Request for save file into storage",
 *     description="Request for save file into CRM storage",
 *     type="object",
 *     required={"url", "provider"},
 *     @OA\Property(
 *         property="url",
 *         type="string",
 *         example="file.jpg: https://crm.nuzhnapomosh.ru/file.jpg",
 *     ),
 *     @OA\Property(
 *         property="provider",
 *         type="string",
 *         example="Provider",
 *     ),
 *      @OA\Property(
 *         property="meta",
 *         type="array",
 *         @OA\Items(),
 *     ),
 * )
 *
 */
class FilestorageCrmRequest extends FormRequest
{
    public function rules()
    {
        return [
            'url' => 'required|string',
            'provider' => 'required|string',
            'meta' => 'array',
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
