<?php

namespace App\Http\Controllers\Main;

use App\Facades\Setting;
use App\Facades\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Questions\awardRequest;
use App\Http\Requests\Questions\newAnswerRequest;
use App\Http\Requests\Questions\newCommentRequest;
use App\Http\Resources\Questions\QuestionsCommentsResource;
use App\Http\Resources\QuestionsCollection;
use App\Http\Resources\Questions\QuestionsResource;
use App\Http\Resources\Questions\QuestionsAnswersResource;
use App\Models\Questions;
use App\Models\QuestionsAnswers;
use App\Models\UsersReviews;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index(Request $request)
    {
        $questions = Questions::where('status', '>', 0)
            ->when($request->has('direction'), function ($query) use ($request) {
                return $query->where('direction_id', $request->get('direction'));
            })
            ->with('user', 'user.personal', 'direction', 'specialization')
            ->withCount('views')
            ->withCount('answers')
            ->withCount('likes')
            ->withCount('reposts')
            ->withCount('favorites')
            ->orderByDesc('publish_at')->get();

        return $this->vMain('questions/index', [
            'questions' => new QuestionsCollection($questions),
        ]);
    }

    public function view(Questions $question, Request $request)
    {
        View::set($question, $request->user());
        return $this->vMain('questions/view', [
            'question' => new QuestionsResource(
                $question
                    ->load('user', 'answers', 'files')
                    ->loadCount('views', 'answers', 'likes', 'reposts', 'favorites')
            ),
        ]);
    }

    public function answer(Questions $question, newAnswerRequest $request)
    {
        if(!$request->user()->hasRole(['verifiedSpecialist'])){
            return $this->jsonResponse(false, 'Ваш профиль не подтвержден!');
        }

        if($question->user_id == $request->user()->id){
            return $this->jsonResponse(false, 'Вы не можете отвечать сами себе!');
        }

        if($question->answers()->where('user_id', $request->user()->id)->exists()){
            return $this->jsonResponse(false, 'Вы уже ответили на данный вопрос!');
        }
        var_dump($request->get('answer'));
        $answer = $question->answers()->create([
            'user_id' => $request->user()->id,
            'answer' => $request->get('answer'),
            'status' => Setting::get('question.answer.default.status')
        ]);

        return $this->jsonResponse(true, 'Ответ опубликован!', new QuestionsAnswersResource($answer->load('user', 'comments')->loadCount('likes', 'comments')));
    }

    public function comment(Questions $question, QuestionsAnswers $answer, newCommentRequest $request)
    {
        if($question->user_id != $request->user()->id && $answer->user_id != $request->user()->id){
            return $this->jsonResponse(false, 'Вы не можете оставлять комментарии под этим ответом!');
        }

        $comment = $answer->comments()->create([
            'user_id' => $request->user()->id,
            'question_id' => $question->id,
            'text' => $request->get('comment'),
            'status' => Setting::get('question.answer.comments.default.status')
        ]);

        return $this->jsonResponse(true, 'Комментарий опубликован!', new QuestionsCommentsResource($comment->load('user')));
    }

    public function award(Questions $question, awardRequest $request)
    {
        $answer = $question->answers()->find($request->get('answer'));

        if($question->user_id != $request->user()->id){
            return $this->jsonResponse(false, 'Вы не можете выбирать ответ в данном вопросе!');
        }

        if(!$answer){
            return $this->jsonResponse(false, 'Ответ не найден!');
        }

        if($answer->selected == 1){
            return $this->jsonResponse(false, 'Ответ уже выбран!');
        }

        if($question->award && $question->answers()->where('selected', 1)->count() > 0){
            if($request->user()->balance < $question->award){
                return $this->jsonResponse(false, 'У вас недостаточно средств! Пополните баланс.');
            }

            $request->user()->transaction()->create([
                'type' => 'award',
                'object_id' => $question->id,
                'action' => 'decrement',
                'sum' => ($question->award || 0),
                'status' => 1
            ]);

            $request->user()->decrement('balance', $question->award);
        }

        $answer->update([
            'selected' => 1,
            'awards' => ($question->award || 0),
        ]);

        $request->user()->reviews()->create([
            'specialist_id' => $answer->user_id,
            'question_id' => $question->id,
            'liked' => $request->get('liked'),
            'disliked' => $request->get('disliked'),
            'rating' => $request->get('rating'),
            'status' => 1
        ]);

        $answer->user->transaction()->create([
            'type' => 'award',
            'object_id' => $question->id,
            'action' => 'increment',
            'sum' => ($question->award || 0),
            'status' => 1
        ]);

        if($question->award){
            $answer->user->increment('balance', $question->award);
        }

        $question->update([
            'status' => 2
        ]);

        return $this->jsonResponse(true, 'Ответ выбран!');
    }
}
