<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NikGov extends Model
{
    protected $table = 'nik_gov';
    protected $primaryKey = 'nik';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['nik', 'fullname'];
}
