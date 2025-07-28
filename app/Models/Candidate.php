<?php

namespace App\Models;

use App\CandidateSex;
use App\CandidateStatus;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'nik',
        'fullname',
        'email',
        'no_telp',
        'address',
        'prev_school',
        'parent_name',
        'parent_telp',
        'parent_email',
        'major',
        'submit_date',
        'birth_date',
        'phase',
        'status',
        'sex',
    ];

    protected function casts(): array {
        return [
            'submit_date' => 'datetime',
            'birth_date' => 'date',
            'status' => CandidateStatus::class,
            'sex' => CandidateSex::class,
        ];
    }
}
