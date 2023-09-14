<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['per_day_ad_limit'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
