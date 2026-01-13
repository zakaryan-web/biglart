<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\setAvatarRequest;
use App\Http\Requests\User\Profile\setPasswordRequest;
use App\Http\Requests\User\Profile\setProfileRequest;
use App\Http\Requests\User\Profile\setSpecialistAvatarRequest;
use App\Http\Requests\User\Profile\setSpecialistProfileRequest;
use App\Http\Resources\Directions\DirectionsResource;
use App\Http\Resources\Directions\Collection\DirectionsCollection;
use App\Http\Resources\Directions\DirectionsSpecializationsResource;
use App\Http\Resources\Documents\Collection\DocumentsCollection;
use App\Models\Directions;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $directions = [];
        $specializations = [];
        foreach ($request->user()->professions as $profession) {
            $directions[$profession->specialization->direction_id] = new DirectionsResource($profession->specialization->direction);
            $specializations[$profession->specialization_id] = new DirectionsSpecializationsResource($profession->specialization);
        }
        return $this->vUser('home/index',[
            'documents' => new DocumentsCollection($request->user()->documents),
            'directions' => new DirectionsCollection(Directions::with('specialisations')->where('status', 1)->get()),
            'userDirections' => $directions,
            'userSpecializations' => $specializations,
        ]);
    }

    public function setProfile(setProfileRequest $request)
    {
        $request->user()->personal()->update([
            'nick_name' => $request->get('nick_name'),
            'gender' => $request->get('gender'),
            'age' => $request->get('age'),
            'city' => $request->get('city'),
        ]);
        $request->user()->update([
            'email' => $request->get('email')
        ]);
        return $this->index($request);
    }

    public function setSpecialistProfile(setSpecialistProfileRequest $request)
    {
        $request->user()->personal()->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'middle_name' => $request->get('middle_name'),
            'gender' => $request->get('gender'),
            'age' => $request->get('age'),
            'city' => $request->get('city'),
            'about' => $request->get('about'),
            'experience' => $request->get('experience'),
        ]);
        $request->user()->update([
            'email' => $request->get('email')
        ]);
        $request->user()->professions()->delete();
        foreach ($request->get('specializations') as $specialization) {
            $request->user()->professions()->create([
                'specialization_id' => $specialization,
            ]);
        }
        return $this->index($request);
    }

    public function setPassword(setPasswordRequest $request)
    {
        $request->user()->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();
        event(new PasswordReset($request->user()));
        return response()->json(['result' => true]);
    }

    public function setAvatar(setAvatarRequest $request)
    {
        $request->user()->personal()->update([
            'avatar' => '/storage/images/avatars/'.$request->get('avatar').'.png',
        ]);
        return response()->json(['result' => '/storage/images/avatars/'.$request->get('avatar').'.png']);
    }

    public function setSpecialistAvatar(setSpecialistAvatarRequest $request)
    {
        $avatar = $request->file('avatar')->store('users/'.$request->user()->id.'/avatars', [
            'disk' => 'public'
        ]);
        $request->user()->personal()->update([
            'avatar' => Storage::url($avatar),
        ]);
        return response()->json(['result' => Storage::url($avatar)]);
    }
}
