<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
     protected $fillable = ['code', 'name', 'location','url', 'image_url'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }
    
    public function favorite_users()
    {
        return $this->users()->where("type","favorite");
    }
}