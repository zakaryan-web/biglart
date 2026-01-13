<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DirectionsProfessions
 * 
 * @property int $id
 * @property int|null $direction_id
 * @property int|null $specialization_id
 * @property string|null $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class DirectionsProfessions extends Model
{
	protected $connection = 'mysql';
	protected $table = 'directions_professions';

	protected $columns = [
		'id',
		'direction_id',
		'specialization_id',
		'name',
		'description',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'direction_id' => 'int',
		'specialization_id' => 'int'
	];

	protected $fillable = [
		'direction_id',
		'specialization_id',
		'name',
		'description'
	];
}
