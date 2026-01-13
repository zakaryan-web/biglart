<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reports
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $reasons_id
 * @property int|null $object_id
 * @property string|null $type
 * @property string|null $reason
 * @property string|null $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Reports extends Model
{
	protected $connection = 'mysql';
	protected $table = 'reports';

	protected $columns = [
		'id',
		'user_id',
		'reasons_id',
		'object_id',
		'type',
		'reason',
		'email',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'reasons_id' => 'int',
		'object_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'reasons_id',
		'object_id',
		'type',
		'reason',
		'email'
	];
}
