<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Questions\addFileRequest;
use App\Http\Requests\User\Questions\setQuestionRequest;
use App\Http\Resources\Questions\QuestionsResource;
use App\Http\Resources\Directions\Collection\DirectionsCollection;
use App\Http\Resources\Directions\Collection\DirectionsSpecializationsCollection;
use App\Models\Directions;
use App\Models\DirectionsSpecializations;
use App\Models\Questions;
use App\Models\QuestionsFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class QuestionsController extends Controller
{
    public function index(Request $request)
    {
        $questions = $request->user()->questions()
            ->with('user')
            ->withCount('answers')
            ->withCount('likes')
            ->withCount('reposts')
            ->withCount('favorites')
            ->orderByDesc('created_at')->get();
        return $this->vUser('questions/index', [
            'questions' => QuestionsResource::collection($questions),
        ]);
    }

    public function create(Request $request) {
        return $this->vUser('questions/edit', [
            'question' => new QuestionsResource(new Questions()),
            'directions' => new DirectionsCollection(Directions::where('status', 1)->get()),
            'specialization' => new DirectionsSpecializationsCollection(DirectionsSpecializations::where('status', 1)->get()),
        ]);
    }

    public function edit(Questions $question, Request $request) {
        if($request->user()->id !== $question->user_id) {
            return response()->redirectToRoute('user.questions.index');
        }
        return $this->vUser('questions/edit', [
            'question' => new QuestionsResource(new Questions()),
            'directions' => new DirectionsCollection(Directions::where('status', 1)->get()),
            'specialization' => new DirectionsSpecializationsCollection(DirectionsSpecializations::where('status', 1)->get()),
        ]);
    }

    public function store(setQuestionRequest $request) {
        if($request->get('id')){
            $question = $request->user()->questions()->find($request->get('id'));
            $question->fill($request->all());
            $question->status = 1;
            $question->save();
        }else{
            $question = $request->user()->questions()->create($request->all());
            $question->publish_at = Carbon::now();
            $question->status = 1;
            $question->save();
            foreach ($request->get('files', []) as $file) {
                QuestionsFiles::where([
                    ['id', $file['id']],
                    ['user_id', $request->user()->id]
                ])->update([
                    'question_id' => $question->id,
                ]);
            }
        }
        return Inertia::location(route('user.questions.index'));
    }

    public function addFile(addFileRequest $request) {
        $file = $request->file('file')->store('users/'.$request->user()->id.'/questions', [
            'disk' => 'public'
        ]);
        return response()->json([
            'success' => true,
            'file' => QuestionsFiles::create([
                'user_id' => $request->user()->id,
                'question_id' => $request->get('id'),
                'file' => $file,
                'url' => Storage::url($file),
                'name' => $request->file('file')->getClientOriginalName(),
                'extension' => $request->file('file')->extension(),
                'mimetype' => $request->file('file')->getMimeType(),
                'status' => 1,
            ])
        ]);
    }

    public function deleteFile(Request $request) {
        return response()->json([
            'success' => QuestionsFiles::where([
                ['id', $request->get('id')],
                ['user_id', $request->user()->id]
            ])->delete()
        ]);
    }
}
