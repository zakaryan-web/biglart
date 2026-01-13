<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users\Collection\UsersCollection;
use App\Http\Resources\Users\UsersResource;
use App\Http\Resources\QuestionsAnswersCollection;
use Illuminate\Http\Request;
use App\Models\Users;

class SpecialistsController extends Controller
{
    public function index(Request $request)
    {
        $specialists = Users::role('specialist')->role('verifiedSpecialist')
            ->with('personal')
            ->with('professions', function ($query) {
                $query->with('specialization', function ($query) {
                    $query->with('direction');
                });
            })
            ->orderByDesc('actions_at')->get();

        return $this->vMain('specialists/index', [
            'specialists' => new UsersCollection($specialists),
        ]);
    }

    public function view(Users $specialist, Request $request)
    {
        if(!$specialist->hasRole('specialist')) {
            return $this->index($request);
        }

        $specialist->load(['personal', 'documents', 'professions' => function ($query) {
            $query->with('specialization', function ($query) {
                $query->with('direction');
            });
        }])->loadCount(['myReviews', 'answers']);

        return $this->vMain('specialists/view', [
            'specialist' => new UsersResource($specialist),
            'answers' => new QuestionsAnswersCollection($specialist->answers()->get()),
        ]);
    }
}
