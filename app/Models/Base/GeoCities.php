<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GeoCities
 * 
 * @property int $id
 * @property int|null $country_id
 * @property int|null $region_id
 * @property string|null $name
 * @property string|null $description
 * @property int $center
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class GeoCities extends Model
{
	protected $connection = 'mysql';
	protected $table = 'geo_cities';

	protected $columns = [
		'id',
		'country_id',
		'region_id',
		'name',
		'description',
		'center',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'country_id' => 'int',
		'region_id' => 'int',
		'center' => 'int'
	];

	protected $fillable = [
		'country_id',
		'region_id',
		'name',
		'description',
		'center'
	];
}
