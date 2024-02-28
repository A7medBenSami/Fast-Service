<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arrive extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'date',
        'user_id',
        'captain_id',
        'from_at',
        'from_long',
        'to_lat',
        'to_long',
        'note',
        'cost',
        'status',
        'vehicle_id',
        'address',
        'location_id',
        'address_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function captain()
    {
        return $this->belongsTo(Captain::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
