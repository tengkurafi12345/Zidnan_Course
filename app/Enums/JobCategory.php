<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum JobCategory: string
{
    use Values;
    case TEACHER = 'Guru';
    case PROGRAMMER = 'Programmer';
    case CONTENT_CREATOR = 'Content Creator';
    case ADMINISTRATOR = 'Administrator';
}
