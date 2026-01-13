<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Resources\Questions\QuestionsResource;
use App\Models\Questions;

class IndexController extends Controller
{
    public function index()
    {
        $questions = Questions::where('status', '>', 0)
            ->with('user')
            ->withCount('answers')
            ->withCount('likes')
            ->withCount('reposts')
            ->withCount('favorites')
            ->orderByDesc('publish_at')
            ->limit(5)
            ->get();

        return $this->vMain('home/index', [
            'questions_count' => Questions::where('status', '>', 0)->count(),
            'questions' => QuestionsResource::collection($questions),
        ]);
    }
}
