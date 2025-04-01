<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum JobType: string
{
    use Values;
    case FULL_TIME = 'Penuh Waktu';
    case PART_TIME = 'Paruh Waktu';
    case CONTRACT = 'Kontrak';
    case DAILY = 'Harian';
    case FREELANCE = 'Pekerja Lepas';
    case INTERNSHIP = 'Magang';
    case FRESH_GRADUATE = 'Fresh Graduate';
}
