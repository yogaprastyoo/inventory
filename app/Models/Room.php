<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasUlids;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['building_id', 'name', 'code', 'description'];

    /**
     * Get the building that owns the room.
     */
    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
