<?php

namespace App\Models;

use App\Models\Base\Questions as BaseQuestions;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Questions extends BaseQuestions
{
    public function user(): HasOne
    {
        return $this->HasOne(Users::class, 'id', 'user_id');
    }

    public function direction(): HasOne
    {
        return $this->HasOne(Directions::class, 'id', 'direction_id');
    }

    public function specialization(): HasOne
    {
        return $this->HasOne(DirectionsSpecializations::class, 'id', 'specialization_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(QuestionsFiles::class, 'question_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(QuestionsAnswers::class, 'question_id')->with('comments')->withCount('likes', 'comments');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(QuestionsTags::class, 'question_id');
    }

    public function views(): hasMany
    {
        return $this->hasMany(QuestionsViews::class, 'question_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(UsersLikes::class, 'object_id');
    }

    public function reposts(): HasMany
    {
        return $this->hasMany(UsersReposts::class, 'object_id');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(UsersFavorites::class, 'object_id');
    }
}
