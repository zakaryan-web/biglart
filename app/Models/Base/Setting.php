<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * 
 * @property string $key
 * @property string|null $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Setting extends Model
{
	protected $connection = 'mysql';
	protected $table = 'setting';
	protected $primaryKey = 'key';
	public $incrementing = false;

	protected $columns = [
		'key',
		'value',
		'created_at',
		'updated_at'
	];

	protected $fillable = [
		'value'
	];
}
