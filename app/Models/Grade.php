<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function updated_by(): BelongsTo {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function created_by(): BelongsTo {
        return $this->belongsTo(User::class, 'created_by');
    }
}
