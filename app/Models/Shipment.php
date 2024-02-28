<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'date',
        'captain_id',
        'user_id',
        'from_lat',
        'from_long',
        'to_lat',
        'to_long',
        'description',
        'cost',
        'status',
        'category_id',
        'vehicle_id',
        'address',
        'address_id',
        'receiver_data_id',
        'location_id',
        'sender_data_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'date',
    ];

    public function captain()
    {
        return $this->belongsTo(Captain::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function receiverData()
    {
        return $this->belongsTo(ReceiverData::class);
    }

    public function senderData()
    {
        return $this->belongsTo(SenderData::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
