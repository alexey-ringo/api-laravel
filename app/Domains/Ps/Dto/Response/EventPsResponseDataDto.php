<?php

namespace App\Domains\Ps\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class EventPsResponseDataDto
 * @package App\Domains\Ps\Dto\Response
 *
 * @OA\Schema(
 *     title="EventPsResponseDataDto",
 *     description="EventPsResponseDataDto",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         example="1632",
 *     ),
 *     @OA\Property(
 *         property="cover_id",
 *         type="integer",
 *         example="15",
 *     ),
 *     @OA\Property(
 *         property="cover_path",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="case_id",
 *         type="integer",
 *         example="24",
 *     ),
 *     @OA\Property(
 *         property="reason_id",
 *         type="integer",
 *         example="46",
 *     ),
 *     @OA\Property(
 *         property="date",
 *         type="string",
 *         example="2020-02-21 21:00:00",
 *     ),
 *     @OA\Property(
 *         property="start",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="end",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Name",
 *     ),
 *     @OA\Property(
 *         property="text",
 *         type="string",
 *         example="Text",
 *     ),
 *     @OA\Property(
 *         property="target",
 *         type="integer",
 *         example="33",
 *     ),
 *     @OA\Property(
 *         property="author_name",
 *         type="string",
 *         example="Иван",
 *     ),
 *     @OA\Property(
 *         property="author_lastname",
 *         type="string",
 *         example="Иванов",
 *     ),
 *     @OA\Property(
 *         property="author_img_path",
 *         type="string",
 *         example="http://avt-15.foto.mail.ru/inbox/kremezion/_avatar?1547110520",
 *     ),
 *     @OA\Property(
 *         property="video",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="video_embed",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="video_cover",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="photo",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="is_publish",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="authors_thanks",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="closed",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="removed",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         example="removed",
 *     ),
 *     @OA\Property(
 *         property="tag",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="date_update",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="isSum",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="is_promo",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="flags",
 *         type="string",
 *         example="[fund]",
 *     ),
 *     @OA\Property(
 *         property="data",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="is_master",
 *         type="boolean",
 *         example="true",
 *     ),
 *     @OA\Property(
 *         property="url",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="language",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="logo",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="group_id",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="view",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="donations_count",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="sum",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="payments_thanks",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         example="2017-12-22T10:01:29.000000Z",
 *     ),
 *     @OA\Property(
 *         property="created_is",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="cache_url",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="id_master",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="is_signup",
 *         type="bool",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="show_instruction",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="meta_template",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="is_comment_photo",
 *         type="bool",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="is_code",
 *         type="bool",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="is_payments",
 *         type="bool",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="is_photo",
 *         type="bool",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="full_photo",
 *         type="bool",
 *         example="false",
 *     ),
 *     @OA\Property(
 *         property="thanks_id",
 *         type="integer",
 *         example="1",
 *     ),
 *     @OA\Property(
 *         property="other_sum",
 *         type="integer",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="name_en",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="text_en",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="author_name_en",
 *         type="string",
 *         example="Ivan",
 *     ),
 *     @OA\Property(
 *         property="author_lastname_en",
 *         type="string",
 *         example="Ivanov",
 *     ),
 *     @OA\Property(
 *         property="form_id",
 *         type="integer",
 *         example="",
 *     ),
 * )
 */
class EventPsResponseDataDto extends DataTransferObject
{
    public int $id;
    public int $user_id;
    public int|null $cover_id;
    public string|null $cover_path;
    // Must be required!
    public int|null $case_id;
    // Must be required!
    public int|null $reason_id;
    public string $date = '';
    public string|null $start;
    public string|null $end;
    // Must be required!
    public string|null $name;
    public string $text = '';
    public int|null $target;
    public string $author_name = '';
    public string $author_lastname = '';
    public string|null $author_img_path;
    public string|null $video;
    public string|null $video_embed;
    public string|null $video_cover;
    public string|null $photo;
    public bool $is_publish;
    public string|null $authors_thanks;
    public string|null $closed;
    public string|null $removed;
    public string $status;
    public string $tag = '';
    public string $date_update;
    public bool $isSum;
    public bool $is_promo = false;
    public string $flags = '[fund]';
    public string|null $data;
    public bool|null $is_master;
    public string|null $url;
    public string|null $language;
    public string|null $logo;
    public int $group_id = 0;
    public int $view = 0;
    public int $donations_count = 0;
    public int $sum = 0;
    public string|null $payments_thanks;
    public string $created_at = '';
    public string|null $created_is;
    public string|null $cache_url;
    public int $id_master = 0;
    public bool $is_signup = false;
    public string|null $show_instruction;
    public string|null $meta_template;
    public bool $is_comment_photo = false;
    public bool $is_code = false;
    public bool $is_payments = false;
    public bool $is_photo = false;
    public bool $full_photo = false;
    public int|null $thanks_id;
    public int $other_sum = 0;
    public string|null $name_en;
    public string|null $text_en;
    public string|null $author_name_en;
    public string|null $author_lastname_en;
    public int|null $form_id;
//    public int $type;
    public int $type = 1;

//    public function __construct(array $data)
//    {
//        //TODO жлюавить образку - если имя больше 50 символов
////        if (isset($data['roles']) && !is_array($data['roles'])) {
////            $data['roles'] = Arr::wrap($data['roles']);
////        }
//        parent::__construct($data);
//    }
}
