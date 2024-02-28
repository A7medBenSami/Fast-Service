<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Laravel\Sanctum\HasApiTokens;




class Captain extends Model implements Authenticatable

{

    use AuthenticatableTrait, Notifiable, HasApiTokens;


    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'email',
        'address',
        'vehicle_number',
        'license_image',
        'vehicle_catalog_image',
        'birth_certificate_image',
        'status',
        'lat',
        'long',
        'vehicle_id',
        'image',
        'phone',
        'otp',
        'isVerified',
        'password',
        'gender',
        'dis_percentage'
    ];

    protected $searchableFields = ['*'];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function arrives()
    {
        return $this->hasMany(Arrive::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($captain) {
            $captain->otp = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $captain->isVerified = 0; // Set isVerified to 0 during user creation
        });
    }
}
