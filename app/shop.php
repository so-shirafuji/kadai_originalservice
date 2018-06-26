<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    protected $fillable = [
        'code',
        'name',
        'tel',
        'station', 
        'url',
        'line',
        'category',
        'name_kana',
        'latitude',
        'longitude',
        'opentime',
        'image',
        'address',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }
    
    public function favorite_users()
    {
        return $this->users()->where("type","favorite");
    }
}