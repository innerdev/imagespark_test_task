<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'name', 'email', 'password'];
    protected $hidden = ['id', 'city_id', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function city()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }

    public function scopeWithName(Builder $builder, $name)
    {
        if (empty($name)) {
            return $builder;
        }

        $regexp = str_replace(" ", "|", preg_replace('/\s+/', ' ', $name));
        $regexp = DB::getPdo()->quote($regexp);
        return $builder->whereRaw("CONCAT(first_name, middle_name, last_name) REGEXP {$regexp}");
    }

    public function scopeWithCityId(Builder $builder, $cityId)
    {
        if (empty($cityId)) {
            return $builder;
        }

        return $builder->where('city_id', $cityId);
    }

    public function scopeWithCityName(Builder $builder, $cityName)
    {
        return $builder->whereHas("city", function ($q) use ($cityName) {
            $q->where("name", "LIKE", "%{$cityName}%");
        });
    }
}

