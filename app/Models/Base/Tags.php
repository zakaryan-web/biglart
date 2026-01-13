<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tags
 * 
 * @property int $id
 * @property string|null $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Tags extends Model
{
	protected $connection = 'mysql';
	protected $table = 'tags';

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
