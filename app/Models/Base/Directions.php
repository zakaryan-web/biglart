<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Directions
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $images
 * @property int|null $sort
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Directions extends Model
{
	protected $connection = 'mysql';
	protected $table = 'directions';

	protected $columns = [
		'id',
		'name',
		'description',
		'images',
		'sort',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'sort' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'images',
		'sort',
		'status'
	];
}
