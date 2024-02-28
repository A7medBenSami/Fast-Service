<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'price'];

    protected $searchableFields = ['*'];

    protected $hidden = ['created_at','updated_at'];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function arrives()
    {
        return $this->hasMany(Arrive::class);
    }
}