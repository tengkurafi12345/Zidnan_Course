<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;

enum Gender:string
{
    use Values;
    use InvokableCases;
    case MALE = "male";
    case FEMALE = "female";
}
