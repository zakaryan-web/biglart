<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentsDirectories
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $parent_id
 * @property string|null $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class DocumentsDirectories extends Model
{
	protected $connection = 'mysql';
	protected $table = 'documents_directories';

	protected $columns = [
		'id',
		'user_id',
		'parent_id',
		'name',
		'description',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'parent_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'parent_id',
		'name',
		'description'
	];
}
