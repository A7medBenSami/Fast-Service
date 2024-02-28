<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceiverData extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'phone', 'remarks','user_id'];

    protected $searchableFields = ['*'];

    protected $table = 'receiver_data';

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}