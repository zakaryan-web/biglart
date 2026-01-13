<?php

namespace App\Models;

use App\Models\Base\Users as BaseUsers;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Users extends BaseUsers
{

    public function personal(): HasOne
    {
        return $this->hasOne(UsersPersonal::class, 'user_id');
    }

    public function social(): HasOne
    {
        return $this->hasOne(UsersSocial::class, 'user_id');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(UsersFavorites::class, 'user_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(UsersLikes::class, 'user_id');
    }

    public function professions(): HasMany
    {
        return $this->hasMany(UsersProfessions::class, 'user_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(UsersReviews::class, 'user_id');
    }

    public function myReviews(): HasMany
    {
        return $this->hasMany(UsersReviews::class, 'specialist_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(QuestionsAnswers::class, 'user_id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Questions::class, 'user_id');
    }

    public function transaction(): HasMany
    {
        return $this->hasMany(UsersTransaction::class, 'user_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Documents::class, 'user_id');
    }

    public function directories(): HasMany
    {
        return $this->hasMany(DocumentsDirectories::class, 'user_id');
    }
}
