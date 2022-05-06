<?php

namespace App\Domains\Takiedela\Dto\Response;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class PostsTakiedelaResponseDataDto
 * @package App\Domains\Takiedela\Dto\Response
 *
 * @OA\Schema(
 *     title="PostsTakiedelaResponseDataDto",
 *     description="News Collection DTO",
 *     @OA\Property(
 *         property="id",
 *         type="int",
 *         example="240548",
 *     ),
 *     @OA\Property(
 *         property="post_author",
 *         type="string",
 *         example="894",
 *     ),
 *     @OA\Property(
 *         property="post_date",
 *         type="string",
 *         example="2021-04-07 08:47:18",
 *     ),
 *     @OA\Property(
 *         property="post_date_gmt",
 *         type="string",
 *         example="2021-04-07 05:47:18",
 *     ),
 *     @OA\Property(
 *         property="post_content",
 *         type="string",
 *         example="На Сахалине обесточены центральные и южные районы острова из-за аварийного отключения электричества на подстанции",
 *     ),
 *     @OA\Property(
 *         property="post_title",
 *         type="string",
 *         example="На Сахалине отключили электричество",
 *     ),
 *     @OA\Property(
 *         property="post_excerpt",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="post_status",
 *         type="string",
 *         example="publish",
 *     ),
 *     @OA\Property(
 *         property="comment_status",
 *         type="string",
 *         example="closed",
 *     ),
 *     @OA\Property(
 *         property="ping_status",
 *         type="string",
 *         example="closed",
 *     ),
 *     @OA\Property(
 *         property="post_password",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="post_name",
 *         type="string",
 *         example="otklyuchili-yelektrichestvo",
 *     ),
 *     @OA\Property(
 *         property="to_ping",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="pinged",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="post_modified",
 *         type="string",
 *         example="2021-04-07 09:23:20",
 *     ),
 *     @OA\Property(
 *         property="post_modified_gmt",
 *         type="string",
 *         example="2021-04-07 06:23:20",
 *     ),
 *     @OA\Property(
 *         property="post_content_filtered",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="post_parent",
 *         type="int",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="guid",
 *         type="string",
 *         example="https://takiedela.ru/?post_type=news&#038;p=240371",
 *     ),
 *     @OA\Property(
 *         property="menu_order",
 *         type="int",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="post_type",
 *         type="string",
 *         example="news",
 *     ),
 *     @OA\Property(
 *         property="post_mime_type",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="comment_count",
 *         type="string",
 *         example="0",
 *     ),
 *     @OA\Property(
 *         property="filter",
 *         type="string",
 *         example="raw",
 *     ),
 *     @OA\Xml(
 *         name="PostsTakiedelaResponseDataDto"
 *     )
 * )
 *
 */
class PostsTakiedelaResponseDataDto extends DataTransferObject
{
    public int $id;
    public string $post_author;
    public string $post_date;
    public string $post_date_gmt;
    public string $post_content;
    public string $post_title;
    public string|null $post_excerpt;
    public string $post_status;
    public string $comment_status;
    public string $ping_status;
    public string|null $post_password;
    public string $post_name;
    public string|null $to_ping;
    public string|null $pinged;
    public string $post_modified;
    public string $post_modified_gmt;
    public string|null $post_content_filtered;
    public int $post_parent;
    public string $guid;
    public int $menu_order;
    public string $post_type;
    public string|null $post_mime_type;
    public string $comment_count;
    public string $filter;

    /**
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromRequest(array $data): self
    {
        return new self(
            id: $data['ID'],
            post_author: $data['post_author'],
            post_date: $data['post_date'],
            post_date_gmt: $data['post_date_gmt'],
            post_content: $data['post_content'],
            post_title: $data['post_title'],
            post_excerpt: $data['post_excerpt'] ?? '',
            post_status: $data['post_status'],
            comment_status: $data['comment_status'],
            ping_status: $data['ping_status'],
            post_password: $data['post_password'] ?? '',
            post_name: $data['post_name'],
            to_ping: $data['to_ping'] ?? '',
            pinged: $data['pinged'] ?? '',
            post_modified: $data['post_modified'],
            post_modified_gmt: $data['post_modified_gmt'],
            post_content_filtered: $data['post_content_filtered'] ?? '',
            post_parent: $data['post_parent'],
            guid: $data['guid'],
            menu_order: $data['menu_order'],
            post_type: $data['post_type'],
            post_mime_type: $data['post_mime_type'] ?? '',
            comment_count: $data['comment_count'],
            filter: $data['filter']
        );
    }
}
