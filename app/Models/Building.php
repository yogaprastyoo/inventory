<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasUlids;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'code', 'description'];

    /**
     * Get the rooms for the building.
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
