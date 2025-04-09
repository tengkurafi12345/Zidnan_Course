<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum JobType: string
{
    use Values;
    case FULL_TIME = 'Full Time';
    case PART_TIME = 'Part Time';
    case CONTRACT = 'Contract';
    case DAILY_WORKER = 'Daily Worker';
    case FREELANCER = 'Freelancer';
    case INTERN = 'Intern';
}
