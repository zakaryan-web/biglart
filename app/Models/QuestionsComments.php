<?php

namespace App\Models;

use App\Models\Base\QuestionsComments as BaseQuestionsComments;
use Illuminate\Database\Eloquent\Relations\HasOne;

class QuestionsComments extends BaseQuestionsComments
{

    protected $with = ['user'];

    public function user(): HasOne
    {
        return $this->HasOne(Users::class, 'id', 'user_id')->with('personal');
    }

}
