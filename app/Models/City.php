<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";
    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function scopeForSelectBox()
    {
        return $this->orderBy('name')->get();
    }
}
