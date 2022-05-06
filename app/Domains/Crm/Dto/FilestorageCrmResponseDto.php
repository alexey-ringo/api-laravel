<?php

namespace App\Domains\Crm\Dto;

use App\Parents\Dto\Base\DataTransferObject;

/**
 * Class FilestorageCrmResponseDto
 * @package App\Domains\Crm\Dto
 *
 * @OA\Schema(
 *     title="FilestorageCrmResponseDto",
 *     description="Filestorage CRM Response Data",
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         example="d9920b5f-4053-48ec-8144-d377ddffbcf1",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="1_4JB7IBWGwEwB65qIpCMTGw.png",
 *     ),
 *     @OA\Property(
 *         property="mime",
 *         type="string",
 *         example="image/png",
 *     ),
 *     @OA\Property(
 *         property="url",
 *         type="string",
 *         example="https://drive.google.com/open?id=1-lR8i9seunIuSn9N5hemeEkulKqvTl",
 *     ),
 *     @OA\Property(
 *         property="path",
 *         type="string",
 *         example="",
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         example="2021-07-19T13:32:40.000000Z",
 *     ),
 * )
 *
 */
class FilestorageCrmResponseDto extends DataTransferObject
{
    public string $id;
    public string $name;
    public string $mime;
    public string|null $url;
    public string|null $path;
    public string $created_at;
}
