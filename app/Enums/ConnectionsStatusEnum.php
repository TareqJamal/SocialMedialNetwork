<?php

namespace App\Enums;

enum ConnectionsStatusEnum: string
{
    case Pending = 'pending';
    case Accepted = 'accepted';
    case Refused = 'refused';

}
