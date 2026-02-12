<?php

namespace App\Enums;

enum NotificationTypesEnum: string
{
    case NewConnection = 'new_connection';
    case AcceptedConnection = 'accepted_connection';
    case CommentPost = 'comment_post';
    case LikePost = 'like_post';


    public function action()
    {
        return match ($this) {
            self::NewConnection => "new_connection",
            self::AcceptedConnection => "accepted_connection",
            self::CommentPost => "comment_post",
            self::LikePost => "like_post",
        };
    }
}
