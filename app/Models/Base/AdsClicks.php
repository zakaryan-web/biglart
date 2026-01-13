<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdsClicks
 * 
 * @property int $id
 * @property int|null $ads_id
 * @property int|null $user_id
 * @property string|null $ip
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class AdsClicks extends Model
{
	protected $connection = 'mysql';
	protected $table = 'ads_clicks';

	protected $columns = [
		'id',
		'ads_id',
		'user_id',
		'ip',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'ads_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'ads_id',
		'user_id',
		'ip'
	];
}
