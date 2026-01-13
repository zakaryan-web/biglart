<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersReviews
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $specialist_id
 * @property int|null $question_id
 * @property string|null $liked
 * @property string|null $disliked
 * @property int $rating
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class UsersReviews extends Model
{
	protected $connection = 'mysql';
	protected $table = 'users_reviews';

	protected $columns = [
		'id',
		'user_id',
		'specialist_id',
		'question_id',
		'liked',
		'disliked',
		'rating',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'specialist_id' => 'int',
		'question_id' => 'int',
		'rating' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'specialist_id',
		'question_id',
		'liked',
		'disliked',
		'rating',
		'status'
	];
}
