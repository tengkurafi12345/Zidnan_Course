<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum JobCategory: string
{
    use Values;

    case ADMIN_HR = "Admin dan HR";
    case MARKETING = "Marketing";
    case OPERATIONAL =  "Operasional";
    case BUSINESS_DEVELOPMENT_AND_SALES = "Business Development dan Sales";
    case ACCOUNTANT_AND_FINANCE = "Akuntansi dan Keuangan";
    case MEDIA_AND_COMMUNICATION = "Media dan Komunikasi";
    case TECHNOLOGY_INFORMATION =  "IT";
    case HUMAN_RESOURCES = "SDM";
}
