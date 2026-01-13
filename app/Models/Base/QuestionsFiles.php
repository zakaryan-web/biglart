<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionsFiles
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $question_id
 * @property string|null $file
 * @property string|null $url
 * @property string|null $name
 * @property string|null $description
 * @property string|null $extension
 * @property string|null $mimetype
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class QuestionsFiles extends Model
{
	protected $connection = 'mysql';
	protected $table = 'questions_files';

	protected $columns = [
		'id',
		'user_id',
		'question_id',
		'file',
		'url',
		'name',
		'description',
		'extension',
		'mimetype',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'question_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'question_id',
		'file',
		'url',
		'name',
		'description',
		'extension',
		'mimetype',
		'status'
	];
}
