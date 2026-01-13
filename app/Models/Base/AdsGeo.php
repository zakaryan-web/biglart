<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdsGeo
 * 
 * @property int $id
 * @property int|null $ads_id
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $city_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class AdsGeo extends Model
{
	protected $connection = 'mysql';
	protected $table = 'ads_geo';

	protected $columns = [
		'id',
		'ads_id',
		'country_id',
		'region_id',
		'city_id',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'ads_id' => 'int',
		'country_id' => 'int',
		'region_id' => 'int',
		'city_id' => 'int'
	];

	protected $fillable = [
		'ads_id',
		'country_id',
		'region_id',
		'city_id'
	];
}
