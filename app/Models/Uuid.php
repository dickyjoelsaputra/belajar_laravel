<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Uuid extends Model
{
    use HasFactory;
    use HasUuids;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name'
    ];
}
