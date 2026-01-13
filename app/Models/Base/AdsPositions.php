<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdsPositions
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $tags
 * @property int|null $width
 * @property int|null $height
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class AdsPositions extends Model
{
	protected $connection = 'mysql';
	protected $table = 'ads_positions';
	public $incrementing = false;

	protected $columns = [
		'id',
		'name',
		'description',
		'tags',
		'width',
		'height',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'id' => 'int',
		'width' => 'int',
		'height' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'tags',
		'width',
		'height'
	];
}
