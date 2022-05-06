<?php

namespace App\Http\Requests\Pay;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BalanceMatchingCampaignPayRequest
 * @package App\Http\Requests\Pay
 *
 * @OA\Schema(
 *     title="BalanceMatchingCampaignPayRequest",
 *     description="BalanceMatchingCampaignPayRequest",
 *     type="object",
 *     required={"user_id", "code"},
 *     @OA\Property(
 *         property="campaign_id",
 *         description="matching campaign id",
 *         type="integer",
 *         format="int64",
 *         example="123321",
 *     ),
 * )
 *
 */
class BalanceMatchingCampaignPayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'campaign_id' => 'required|integer'
        ];
    }

    public function attributes()
    {
        return [

        ];
    }
}
