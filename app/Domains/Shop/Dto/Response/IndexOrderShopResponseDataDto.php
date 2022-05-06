<?php

namespace App\Domains\Shop\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class IndexOrderShopResponseDataDto
 * @package App\Domains\Shop\Dto\Response
 *
 * @OA\Schema(
 *     title="IndexOrderShopResponseDataDto",
 *     description="IndexOrderShopResponseDataDto",
 *     @OA\Property(
 *         property="order_id",
 *         type="integer",
 *         example="2246",
 *     ),
 *     @OA\Property(
 *         property="invoice_no",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="invoice_prefix",
 *         type="string",
 *         example="INV-2020-00",
 *     ),
 *     @OA\Property(
 *         property="store_id",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="store_name",
 *         type="string",
 *         example="Такие дела",
 *     ),
 *     @OA\Property(
 *         property="store_url",
 *         type="string",
 *         example="https://shop.takiedela.ru/",
 *     ),
 *     @OA\Property(
 *         property="customer_id",
 *         type="integer",
 *         example="23238",
 *     ),
 *     @OA\Property(
 *         property="firstname",
 *         type="string",
 *         example="Иван",
 *     ),
 *     @OA\Property(
 *         property="lastname",
 *         type="string",
 *         example="Иванов",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         example="ivan@mail.ru",
 *     ),
 *     @OA\Property(
 *         property="telephone",
 *         type="string",
 *         example="+7 911 123-45-67",
 *     ),
 *     @OA\Property(
 *         property="custom_field",
 *         type="array",
 *         @OA\Items(),
 *     ),
 *     @OA\Property(
 *         property="shipping_address_1",
 *         type="string",
 *         example="Новосибирская обл., Новосибирск, Петухова ул., д. 21",
 *     ),
 *     @OA\Property(
 *         property="shipping_method",
 *         type="string",
 *         example="В пункт выдачи Сберпосылка",
 *     ),
 *     @OA\Property(
 *         property="shipping_method_sum",
 *         type="string",
 *         example="264.0000",
 *     ),
 *     @OA\Property(
 *         property="comment",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="total",
 *         type="number",
 *         format="float",
 *         example="284.00",
 *     ),
 *     @OA\Property(
 *         property="order_status_id",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="order_status",
 *         type="string",
 *         example="Ожидание оплаты",
 *     ),
 *     @OA\Property(
 *         property="affiliate_id",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="commission",
 *         type="number",
 *         format="float",
 *         example="0.0",
 *     ),
 *     @OA\Property(
 *         property="language_id",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="language_code",
 *         type="string",
 *         example="ru-ru",
 *     ),
 *     @OA\Property(
 *         property="currency_id",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="currency_code",
 *         type="string",
 *         example="RUB",
 *     ),
 *     @OA\Property(
 *         property="currency_value",
 *         type="number",
 *         format="float",
 *         example="1.0",
 *     ),
 *     @OA\Property(
 *         property="ip",
 *         type="string",
 *         example="192.168.1.1",
 *     ),
 *     @OA\Property(
 *         property="forwarded_ip",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="user_agent",
 *         type="string",
 *         example="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36",
 *     ),
 *     @OA\Property(
 *         property="accept_language",
 *         type="string",
 *         example="ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7",
 *     ),
 *     @OA\Property(
 *         property="date_added",
 *         type="string",
 *         example="2020-10-28 17:04:13",
 *     ),
 *     @OA\Property(
 *         property="date_modified",
 *         type="string",
 *         example="2020-10-28 17:04:13",
 *     ),
 * )
 */
class IndexOrderShopResponseDataDto extends DataTransferObject
{
    public int $order_id;
    public int $invoice_no;
    public string $invoice_prefix;
    public int $store_id;
    public string $store_name;
    public string $store_url;
    public int $customer_id;
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $telephone;
    public array $custom_field;
    public string $shipping_address_1;
    public string $shipping_method;
    public string $shipping_method_sum;
    public string $comment;
//    public float $total;
    public string $total;
    public int $order_status_id;
    public string $order_status;
    public int $affiliate_id;
//    public float $commission;
    public string $commission;
    public int $language_id;
    public string $language_code;
    public int $currency_id;
    public string $currency_code;
//    public float $currency_value;
    public string $currency_value;
    public string $ip;
    public string $forwarded_ip;
    public string $user_agent;
    public string $accept_language;
    public string $date_added;
    public string $date_modified;
}
