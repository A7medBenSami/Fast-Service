<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'image', 'price'];

    protected $searchableFields = ['*'];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function captains()
    {
        return $this->hasMany(Captain::class);
    }

    public function arrives()
    {
        return $this->hasMany(Arrive::class);
    }
}
