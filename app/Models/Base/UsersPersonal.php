<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersPersonal
 * 
 * @property int $id
 * @property int $user_id
 * @property string|null $avatar
 * @property string|null $nick_name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $middle_name
 * @property int|null $age
 * @property int|null $gender
 * @property string|null $about
 * @property string|null $city
 * @property int|null $experience
 * @property float|null $rating
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class UsersPersonal extends Model
{
	protected $connection = 'mysql';
	protected $table = 'users_personal';

	protected $columns = [
		'id',
		'user_id',
		'avatar',
		'nick_name',
		'first_name',
		'last_name',
		'middle_name',
		'age',
		'gender',
		'about',
		'city',
		'experience',
		'rating',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'age' => 'int',
		'gender' => 'int',
		'experience' => 'int',
		'rating' => 'float'
	];

	protected $fillable = [
		'user_id',
		'avatar',
		'nick_name',
		'first_name',
		'last_name',
		'middle_name',
		'age',
		'gender',
		'about',
		'city',
		'experience',
		'rating'
	];
}
