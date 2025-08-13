<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    protected $table = 'grades';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nik',
        'name',
        'value',
        'updated_by',
        'created_by',
    ];

    public function candidate(): BelongsTo {
        return $this->belongsTo(Candidate::class, 'nik', 'nik');
    }
}
