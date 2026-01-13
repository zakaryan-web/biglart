<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersSocial
 * 
 * @property int $id
 * @property int $user_id
 * @property string|null $vk_id
 * @property string|null $tg_id
 * @property string|null $google_id
 * @property string|null $yandex_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class UsersSocial extends Model
{
	protected $connection = 'mysql';
	protected $table = 'users_social';

	protected $columns = [
		'id',
		'user_id',
		'vk_id',
		'tg_id',
		'google_id',
		'yandex_id',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'vk_id',
		'tg_id',
		'google_id',
		'yandex_id'
	];
}
