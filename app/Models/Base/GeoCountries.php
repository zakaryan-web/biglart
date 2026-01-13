<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GeoCountries
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class GeoCountries extends Model
{
	protected $connection = 'mysql';
	protected $table = 'geo_countries';

	protected $columns = [
		'id',
		'name',
		'description',
		'created_at',
		'updated_at'
	];

	protected $fillable = [
		'name',
		'description'
	];
}
