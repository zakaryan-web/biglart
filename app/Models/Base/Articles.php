<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Articles
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $specialization_id
 * @property string|null $title
 * @property string|null $text
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Articles extends Model
{
	protected $connection = 'mysql';
	protected $table = 'articles';

	protected $columns = [
		'id',
		'user_id',
		'specialization_id',
		'title',
		'text',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'specialization_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'specialization_id',
		'title',
		'text',
		'status'
	];
}
