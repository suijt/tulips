<?php

namespace App\Models\Modules\City;

use App\Models\Modules\Country\Country;
use App\Models\Modules\Population\Population;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['country_id', 'name'];

    function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    function populations()
    {
        return $this->hasMany(Population::class);
    }
}
