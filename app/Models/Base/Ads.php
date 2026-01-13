<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ads
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $client
 * @property int $target
 * @property int $always
 * @property Carbon|null $start_at
 * @property Carbon|null $end_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Ads extends Model
{
	protected $connection = 'mysql';
	protected $table = 'ads';

	protected $columns = [
		'id',
		'name',
		'description',
		'client',
		'target',
		'always',
		'start_at',
		'end_at',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'target' => 'int',
		'always' => 'int',
		'start_at' => 'datetime',
		'end_at' => 'datetime'
	];

	protected $fillable = [
		'name',
		'description',
		'client',
		'target',
		'always',
		'start_at',
		'end_at'
	];
}
