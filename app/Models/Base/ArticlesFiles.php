<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticlesFiles
 * 
 * @property int $id
 * @property int|null $article_id
 * @property string|null $file
 * @property string|null $name
 * @property string|null $description
 * @property int $status
 * @property string|null $mimetype
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class ArticlesFiles extends Model
{
	protected $connection = 'mysql';
	protected $table = 'articles_files';

	protected $columns = [
		'id',
		'article_id',
		'file',
		'name',
		'description',
		'status',
		'mimetype',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'article_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'article_id',
		'file',
		'name',
		'description',
		'status',
		'mimetype'
	];
}
