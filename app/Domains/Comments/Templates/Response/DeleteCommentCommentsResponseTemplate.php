<?php

namespace App\Domains\Comments\Templates\Response;

class DeleteCommentCommentsResponseTemplate
{
    public static array $remoteResponse = [
        "message" => "Comment deleted",
    ];

    public static array $outgoingResponse = [
        "message" => "Comment deleted",
    ];

    public static array $structureResponse = [
        'message'
    ];
}
