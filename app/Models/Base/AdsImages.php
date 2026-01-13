<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AdsImages
 * 
 * @property int $id
 * @property int|null $ads_id
 * @property int|null $position_id
 * @property string|null $file
 * @property string|null $text
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class AdsImages extends Model
{
	protected $connection = 'mysql';
	protected $table = 'ads_images';

	protected $columns = [
		'id',
		'ads_id',
		'position_id',
		'file',
		'text',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'ads_id' => 'int',
		'position_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'ads_id',
		'position_id',
		'file',
		'text',
		'status'
	];
}
