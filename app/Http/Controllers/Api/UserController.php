<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Resources\Api\AddressResource;
use App\Http\Resources\Api\UserResource;
use App\Models\MediaManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          return new UserResource(auth()->user());

    }


    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate(
            [
                'avatar' => 'nullable|max:4000|mimes:jpeg,png,webp,jpg'
            ],
            [
                'avatar.max' => 'Max file size is 4MB!'
            ]
        );
        if ($request->hasFile('avatar')) {
            $mediaFile = new MediaManager();
            $mediaFile->user_id = auth()->user()->id;
            $mediaFile->media_file = $request->file('avatar')->store('uploads/media');
            $mediaFile->media_size = $request->file('avatar')->getSize();
            $mediaFile->media_name = $request->file('avatar')->getClientOriginalName();
            $mediaFile->media_extension = $request->file('avatar')->getClientOriginalExtension();

            if (getFileType(Str::lower($mediaFile->media_extension)) != null) {
                $mediaFile->media_type = getFileType(Str::lower($mediaFile->media_extension));
            } else {
                $mediaFile->media_type = "unknown";
            }
            $mediaFile->save();
            $user->avatar = $mediaFile->id;
        }
        $user->name = $request->name;
        $user->phone = validatePhone($request->phone);
        $user->save();
        return $this->success(localize('Profile updated successfully'));

    }

    public function passwordUpdate(Request $request)
    {

        $user = auth()->user();

        $request->validate(
            [
                'password' => 'required|confirmed|min:6'
            ]
        );
        $user->password = Hash::make($request->password);
        $user->save();
        return $this->success(localize('Password updated successfully'));
    }
    public function photoUpdate(Request $request)
    {
        //
    }




}
