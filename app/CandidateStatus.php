<?php

namespace App;

enum CandidateStatus: string
{
    case UNVERIFIED = "unverified";
    case VERIFIED = "verified";
    case ACTIVE = "active";
}
