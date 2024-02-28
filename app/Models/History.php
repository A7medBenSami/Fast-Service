<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'date',
        'vehicle',
        'user_id',
        'captain_id',
        'from_lat',
        'from_long',
        'to_lat',
        'to_long',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'date',
    ];
}
