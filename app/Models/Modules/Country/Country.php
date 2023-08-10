<?php

namespace App\Models\Modules\Country;

use App\Models\Modules\City\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    function cities()
    {
        return $this->hasMany(City::class);
    }
}
