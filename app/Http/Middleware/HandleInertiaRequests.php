<?php

namespace App\Http\Middleware;

use App\Http\Resources\Users\UsersResource;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = false;
        if($request->user()){
            $request->user()->update([
                'actions_at' => Carbon::now()
            ]);
            $user = [
                'data' => $request->user()->load('personal')->toResource(UsersResource::class),
                'roleClient' => $request->user()->hasRole(['client']),
                'roleSpecialist' => $request->user()->hasRole(['specialist']),
                'verifiedSpecialist' => $request->user()->hasRole(['verifiedSpecialist']),
            ];
        }

        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'config' => [],
            'auth' => [
                'user' => $user
            ],
        ];
    }
}
