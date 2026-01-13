<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionsTags
 * 
 * @property int $id
 * @property int|null $question_id
 * @property int|null $tag_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class QuestionsTags extends Model
{
	protected $connection = 'mysql';
	protected $table = 'questions_tags';

	protected $columns = [
		'id',
		'question_id',
		'tag_id',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'question_id' => 'int',
		'tag_id' => 'int'
	];

	protected $fillable = [
		'question_id',
		'tag_id'
	];
}
