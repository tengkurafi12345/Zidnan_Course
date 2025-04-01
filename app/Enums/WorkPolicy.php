<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum WorkPolicy: string
{
    use Values;
    case REMOTE = 'Kerja Remote';
    case ON_SITE =  'Kerja Di Kantor';
    case HYBRID = 'Kerja Di Kantor / Rumah';
}
