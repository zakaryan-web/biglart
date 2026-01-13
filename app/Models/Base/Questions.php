<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Questions
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $direction_id
 * @property int|null $specialization_id
 * @property string|null $question
 * @property string|null $description
 * @property float|null $award
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $publish_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Questions extends Model
{
	protected $connection = 'mysql';
	protected $table = 'questions';

	protected $columns = [
		'id',
		'user_id',
		'direction_id',
		'specialization_id',
		'question',
		'description',
		'award',
		'status',
		'created_at',
		'publish_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'direction_id' => 'int',
		'specialization_id' => 'int',
		'award' => 'float',
		'status' => 'int',
		'publish_at' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'direction_id',
		'specialization_id',
		'question',
		'description',
		'award',
		'status',
		'publish_at'
	];
}
