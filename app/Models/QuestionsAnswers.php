<?php

namespace App\Models;

use App\Http\Resources\Questions\QuestionsAnswersResource;
use App\Models\Base\QuestionsAnswers as BaseQuestionsAnswers;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class QuestionsAnswers extends BaseQuestionsAnswers
{
    protected $with = ['user'];

    public function user(): HasOne
    {
        return $this->HasOne(Users::class, 'id', 'user_id')->with('personal', 'professions');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(UsersLikes::class, 'object_id')->where('type', 'answer');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(QuestionsComments::class, 'answer_id');
    }
}
