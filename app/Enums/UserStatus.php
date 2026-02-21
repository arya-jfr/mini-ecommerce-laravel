<?php

namespace App\Enums;

enum UserStatus: int //	0:disable | 1:pending | 2:ban | 3:enable
{
    case DISABLE = 0;
    case PENDING = 1;
    case BAN = 2;
    case ENABLE = 3;
}
