<?php

namespace App\Domains\Edu\Dto\Request;

use App\Domains\Edu\Dto\Base\BaseEduRequestDto;

class IndexUsersTeachersEduRequestDto extends BaseEduRequestDto
{
    public int|null $user_id;
    public string|null $email;

    /**
     * @param array $data
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function __construct(array $data)
    {
        $data['user_id'] = $data['id'] ?? null;

        parent::__construct($data);
    }
}
