<?php

namespace App\Enums;

enum ProductStatus: int //0:draft | 1:enable | 2:disable
{
    case DRAFT = 0;
    case ENABLE = 1;
    case DISABLE = 2;
}
