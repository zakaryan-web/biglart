<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersProfessions
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $direction_id
 * @property int|null $specialization_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class UsersProfessions extends Model
{
	protected $connection = 'mysql';
	protected $table = 'users_professions';

	protected $columns = [
		'id',
		'user_id',
		'direction_id',
		'specialization_id',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'direction_id' => 'int',
		'specialization_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'direction_id',
		'specialization_id'
	];
}
