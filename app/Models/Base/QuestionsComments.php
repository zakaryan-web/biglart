<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionsComments
 * 
 * @property int $id
 * @property int|null $question_id
 * @property int|null $answer_id
 * @property int|null $user_id
 * @property string|null $text
 * @property int|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class QuestionsComments extends Model
{
	protected $connection = 'mysql';
	protected $table = 'questions_comments';

	protected $columns = [
		'id',
		'question_id',
		'answer_id',
		'user_id',
		'text',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'question_id' => 'int',
		'answer_id' => 'int',
		'user_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'question_id',
		'answer_id',
		'user_id',
		'text',
		'status'
	];
}
