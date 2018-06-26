<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
      public function shops()
    {
        return $this->belongsToMany(shop::class,'user_favorite', 'user_id', 'shop_id')->withTimestamps();
    }

    public function favorite_shops()
    {
        return $this->shops();
    }

    public function favorite($shopId)
    {
        // Is the user already "favorite"?
        $exist = $this->is_favoriteing($shopId);

        if ($exist) {
            // do nothing
            return false;
        } else {
            // do "favorite"
            $this->shops()->attach($shopId);
            return true;
        }
    }

    public function dont_favorite($shopId)
    {
        // Is the user already "favorite"?
        $exist = $this->is_favoriteing($shopId);

        if ($exist) {
            // remove "favorite"
            \DB::delete("DELETE FROM user_favorite WHERE user_id = ? AND shop_id = ?", [\Auth::user()->id, $shopId]);
        } else {
            // do nothing
            return false;
        }
    }

    public function is_favoriteing($shopIdOrCode)
    {
        // dd($shopIdOrCode);
        if (is_numeric($shopIdOrCode)) {
            $shop_id_exists = $this->favorite_shops()->where('shop_id', $shopIdOrCode)->exists();
            return $shop_id_exists;
        } else {
            $shop_code_exists = $this->favorite_shops()->where('code', $shopIdOrCode)->exists();
            return $shop_code_exists;
        }
    }
}
