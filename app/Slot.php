<?php

namespace PaHooSBooKinG;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        'id', 'location','space'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function getAll()
    {
        return Slots::all();
    }
}
