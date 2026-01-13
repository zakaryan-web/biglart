<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DirectionsSpecializations
 * 
 * @property int $id
 * @property int|null $direction_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $sort
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class DirectionsSpecializations extends Model
{
	protected $connection = 'mysql';
	protected $table = 'directions_specializations';

	protected $columns = [
		'id',
		'direction_id',
		'name',
		'description',
		'sort',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'direction_id' => 'int',
		'sort' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'direction_id',
		'name',
		'description',
		'sort',
		'status'
	];
}
