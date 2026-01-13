<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 * 
 * @property string $key
 * @property string|null $name
 * @property int|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Language extends Model
{
	protected $connection = 'mysql';
	protected $table = 'language';
	protected $primaryKey = 'key';
	public $incrementing = false;

	protected $columns = [
		'key',
		'name',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'status'
	];
}
