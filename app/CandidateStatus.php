<?php

namespace App;

enum CandidateStatus
{
    case UNVERIFIED = 'unverified';
    case VERIFIED = 'verified';
    case ACTIVE = 'active';
}
