<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\NewPasswordRequest;
use App\Http\Requests\Auth\RecoveryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class PasswordRecoveryController extends Controller
{
    public function index()
    {
        return $this->vAuth('recovery/index', ['send' => false]);
    }

    public function send(RecoveryRequest $request)
    {
        Password::sendResetLink($request->only('email'));
        return $this->vAuth('recovery/index', ['send' => Password::sendResetLink($request->only('email'))]);
    }

    public function reset(Request $request)
    {
        return $this->vAuth('newpassword/index', [
            'email' => $request->email,
            'token' => $request->route('token'),
        ]);
    }

    public function store(NewPasswordRequest $request): RedirectResponse
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();
                event(new PasswordReset($user));
                Auth::login($user);
            }
        );

        return to_route('main.home.index');
    }
}
