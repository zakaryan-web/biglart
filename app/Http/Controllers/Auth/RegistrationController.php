<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\Users;

class RegistrationController extends Controller
{
    public function index()
    {
        return $this->vAuth('registration/index');
    }

    public function store(RegistrationRequest $request): RedirectResponse
    {
        $user = Users::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('user');
        switch ($request->type){
            case 1:
                $user->assignRole('client');
                break;
            case 2:
                $user->assignRole('specialist');
                $user->assignRole('verifiedSpecialist');
                break;
        }
        event(new Registered($user));

        Auth::login($user);
        $user->personal()->update([
            'nick_name' => 'Пользователь #'.$user->id,
            'avatar' => '/storage/images/avatars/'.mt_rand(1, 23).'.png',
        ]);
        return to_route('main.home.index');
    }
}
