<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        'id', 'location','space','latitude','longtitude'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    static public function getAll()
    {
        return Slot::all();
    }
}
