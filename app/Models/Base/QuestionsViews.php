<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionsViews
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $question_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class QuestionsViews extends Model
{
	protected $connection = 'mysql';
	protected $table = 'questions_views';

	protected $columns = [
		'id',
		'user_id',
		'question_id',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'question_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'question_id'
	];
}
