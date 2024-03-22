<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Resources\Api\AddressResource;
use App\Http\Resources\Api\CityResource;
use App\Http\Resources\Api\CountryResource;
use App\Http\Resources\Api\StateResource;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = auth()->user()->addresses()->latest()->get();
        return AddressResource::collection($addresses);
    }

    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $address                = new UserAddress;
        $address->user_id       = $userId;
        $address->country_id    = $request->country_id;
        $address->state_id      = $request->state_id;
        $address->city_id       = $request->city_id;

        if ($request->is_default == 1) {
            $prevDefault = UserAddress::where('user_id', $userId)->where('is_default', 1)->first();
            if (!is_null($prevDefault)) {
                $prevDefault->is_default = 0;
                $prevDefault->save();
            }
        }
        $address->is_default    = $request->is_default;
        $address->address       = $request->address;
        $address->save();
        return $this->success(localize('Address has been inserted successfully'));
    }

    # edit address
    public function edit($id)
    {
        $address  = UserAddress::where('user_id', auth()->user()->id)->where('id', $id)->first();
        
        return new AddressResource($address);
    }

    # update address
    public function update(Request $request)
    {
        $userId   = auth()->user()->id;
        $address  = UserAddress::where('user_id', $userId)->where('id', $request->id)->first();

        $address->country_id    = $request->country_id;
        $address->state_id      = $request->state_id;
        $address->city_id       = $request->city_id;
        if ($request->is_default == 1) {
            $prevDefault = UserAddress::where('user_id', $userId)->where('is_default', 1)->first();
            if (!is_null($prevDefault)) {
                $prevDefault->is_default = 0;
                $prevDefault->save();
            }
        }
        $address->is_default    = $request->is_default;
        $address->address       = $request->address;
        $address->save();
        return $this->success(localize('Address has been updated successfully'));
    }

    # delete address
    public function delete($id)
    {
        $user = auth()->user();
        UserAddress::where('user_id', $user->id)->where('id', $id)->delete();

        return $this->success(localize('Address has been deleted successfully'));
    }



    # get states based on country
    public function getCountries(Request $request)
    {
        $countries = Country::isActive()->get();
        return CountryResource::collection($countries);
    }


    # get states based on country
    public function getStates(Request $request)
    {
        $states = State::isActive()->where('country_id', $request->country_id)->get();
        return StateResource::collection($states);
    }

    # get cities based on state
    public function getCities(Request $request)
    {
        $cities = City::isActive()->where('state_id', $request->state_id)->get();
        return CityResource::collection($cities);
    }
}
