<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GeoRegions
 * 
 * @property int $id
 * @property int|null $country_id
 * @property string|null $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class GeoRegions extends Model
{
	protected $connection = 'mysql';
	protected $table = 'geo_regions';

	protected $columns = [
		'id',
		'country_id',
		'name',
		'description',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'country_id' => 'int'
	];

	protected $fillable = [
		'country_id',
		'name',
		'description'
	];
}
