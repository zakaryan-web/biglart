<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersTransaction
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $object_id
 * @property string|null $type
 * @property string|null $action
 * @property float $sum
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class UsersTransaction extends Model
{
	protected $connection = 'mysql';
	protected $table = 'users_transaction';

	protected $columns = [
		'id',
		'user_id',
		'object_id',
		'type',
		'action',
		'sum',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'object_id' => 'int',
		'sum' => 'float',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'object_id',
		'type',
		'action',
		'sum',
		'status'
	];
}
