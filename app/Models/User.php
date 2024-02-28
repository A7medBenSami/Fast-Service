<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'gender',
        'image',
        'otp',
        'isVerified',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function receiverData()
    {
        return $this->hasMany(receiverData::class);
    }

    public function senderData()
    {
        return $this->hasMany(senderData::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function arrives()
    {
        return $this->hasMany(Arrive::class);
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->otp = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $user->isVerified = 0; // Set isVerified to 0 during user creation
        });
    }

}