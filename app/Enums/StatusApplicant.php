<?php

namespace App\Enums;

enum StatusApplicant: string
{
    case PENDING = "pending";
    case REVIEWED = "reviewed";
    case INTERVIEW = "interview";
    case REJECTED = "rejected";
    case HIRED = "hired";
}
