<?php

namespace App\Models\Modules\Population;

use App\Models\Modules\City\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['city_id', 'type', 'number'];

    function country()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
