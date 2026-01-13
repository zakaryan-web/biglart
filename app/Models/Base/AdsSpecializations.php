<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdsSpecializations
 * 
 * @property int $id
 * @property int|null $ads_id
 * @property int|null $specialization_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class AdsSpecializations extends Model
{
	protected $connection = 'mysql';
	protected $table = 'ads_specializations';

	protected $columns = [
		'id',
		'ads_id',
		'specialization_id',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'ads_id' => 'int',
		'specialization_id' => 'int'
	];

	protected $fillable = [
		'ads_id',
		'specialization_id'
	];
}
