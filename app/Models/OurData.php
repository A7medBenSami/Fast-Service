<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurData extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'about_us',
        'privacy_policy',
        'address',
        'phone',
        'email',
        'help_and_support',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'our_data';
}
