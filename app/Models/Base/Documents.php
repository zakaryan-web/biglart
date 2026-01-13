<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Documents
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $directory_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $url
 * @property string|null $file
 * @property string|null $extension
 * @property string|null $mimetype
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Documents extends Model
{
	protected $connection = 'mysql';
	protected $table = 'documents';

	protected $columns = [
		'id',
		'user_id',
		'directory_id',
		'name',
		'description',
		'url',
		'file',
		'extension',
		'mimetype',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'directory_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'directory_id',
		'name',
		'description',
		'url',
		'file',
		'extension',
		'mimetype',
		'status'
	];
}
