<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pages
 * 
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $text
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Pages extends Model
{
	protected $connection = 'mysql';
	protected $table = 'pages';

	protected $columns = [
		'id',
		'title',
		'slug',
		'text',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'title',
		'slug',
		'text',
		'status'
	];
}
