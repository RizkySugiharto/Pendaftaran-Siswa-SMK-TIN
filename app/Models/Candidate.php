<?php

namespace App\Models;

use App\CandidateGender;
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
        'gender',
    ];

    protected function casts(): array {
        return [
            'submit_date' => 'datetime',
            'birth_date' => 'date',
            'status' => CandidateStatus::class,
            'gender' => CandidateGender::class,
        ];
    }

    public function grades() {
        return $this->hasMany(Grade::class, 'nik', 'nik');
    }
}
