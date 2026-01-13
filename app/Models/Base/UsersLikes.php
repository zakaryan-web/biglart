<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersLikes
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $object_id
 * @property string|null $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class UsersLikes extends Model
{
	protected $connection = 'mysql';
	protected $table = 'users_likes';

	protected $columns = [
		'id',
		'user_id',
		'object_id',
		'type',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'object_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'object_id',
		'type'
	];
}
