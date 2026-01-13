<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionsAnswers
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $question_id
 * @property string|null $answer
 * @property int|null $selected
 * @property float $awards
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class QuestionsAnswers extends Model
{
	protected $connection = 'mysql';
	protected $table = 'questions_answers';

	protected $columns = [
		'id',
		'user_id',
		'question_id',
		'answer',
		'selected',
		'awards',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'question_id' => 'int',
		'selected' => 'int',
		'awards' => 'float',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'question_id',
		'answer',
		'selected',
		'awards',
		'status'
	];
}
