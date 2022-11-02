<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use TCG\Voyager\Models\Role;
use App\Traits\HasOrder;

class User extends \TCG\Voyager\Models\User implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia, Filter, HasOrder;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    public function assignRole($role)
    {
        $user = $this;
        $role = Role::where('display_name', $role)->first();
        if ($role == null) {
            return false;
        }
        $user->update([
            'role_id' => $role->id
        ]);
        return true;
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }
    public function driverOrders()
    {
        return $this->hasMany(Order::class, 'driver_id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
