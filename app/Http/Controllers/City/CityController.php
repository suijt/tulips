<?php

namespace App\Http\Controllers\City;

use App\Contracts\CityInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\City\CityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $city;

    public function __construct(CityInterface $city)
    {
        $this->city = $city;
    }

    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        return response()->json($this->city->getAllCitiesByCountry($request));
    }

    public function store(CityRequest $request)
    {
        $city = $this->city->storeCity($request);
        if ($city) {
            $success = 'success';
            $message = "City successfully created!";
        } else {
            $success = 'error';
            $message = "City creation Failed!";
        }

        return redirect()->back()->with($success, $message);
    }
}
