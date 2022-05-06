<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SetMatchingCampaignPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="SetMatchingCampaignPayRequest",
 *     description="SetMatchingCampaignPayRequest",
 *     type="object",
 *     required={"user_id"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="123",
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         example="223322",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Campaign",
 *     ),
 *     @OA\Property(
 *         property="max_sum",
 *         type="string",
 *         example="20000",
 *     ),
 *     @OA\Property(
 *         property="recurrent",
 *         description="Recurrent type. Available value = 0, 1, 2",
 *         type="string",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="email_domain",
 *         type="string",
 *         example="@nuzhnapomosh.ru",
 *     ),
 *     @OA\Property(
 *         property="text",
 *         type="string",
 *         example="Text",
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="cases",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="target_id",
 *         type="string",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="activate",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="draft",
 *     ),
 *     @OA\Property(
 *         property="event_link",
 *         type="string",
 *         example="https://sluchaem.ru/event/7799",
 *     ),
 *     @OA\Property(
 *         property="start_campaign",
 *         type="integer",
 *         example="07.11.2021",
 *     ),
 *     @OA\Property(
 *         property="stop_campaign",
 *         type="string",
 *         example="07.12.2021",
 *     ),
 * )
 *
 */
class SetMatchingCampaignPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'nullable|integer',
            'user_id' => 'required|integer',
            'name' => 'nullable|string',
            'max_sum' => 'nullable|integer',
            'recurrent' => 'nullable|string',
            'email_domain' => 'nullable|string',
            'text' => 'nullable|string',
            'type' => 'nullable|string',
            'cases' => 'nullable|array',
            'target_id' => 'nullable|string',
            'activate' => 'nullable|boolean_or_string_as_bool',
            'status' => 'nullable|string',
            'event_link' => 'nullable|string',
            'start_campaign' => 'nullable|string',
            'stop_campaign' => 'nullable|string'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
