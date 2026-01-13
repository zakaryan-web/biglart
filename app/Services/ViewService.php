<?php

namespace App\Services;

class ViewService
{
    public function __construct()
    {
    }

    public function set($model, $user): void
    {
        if (method_exists($model, 'views')) {
            if($user){
                $model->views()->upsert([
                    [ 'user_id' => $user->id ],
                ], uniqueBy: [ 'user_id', 'question_id' ]);
            }else{
                //$model->views()->create([]);
            }
        }
    }
}
