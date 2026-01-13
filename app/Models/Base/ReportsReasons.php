<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportsReasons
 * 
 * @property int $id
 * @property string|null $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class ReportsReasons extends Model
{
	protected $connection = 'mysql';
	protected $table = 'reports_reasons';

	protected $columns = [
		'id',
		'title',
		'created_at',
		'updated_at'
	];

	protected $fillable = [
		'title'
	];
}
