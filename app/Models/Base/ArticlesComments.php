<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticlesComments
 * 
 * @property int $id
 * @property int|null $article_id
 * @property int|null $user_id
 * @property string|null $text
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class ArticlesComments extends Model
{
	protected $connection = 'mysql';
	protected $table = 'articles_comments';

	protected $columns = [
		'id',
		'article_id',
		'user_id',
		'text',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'article_id' => 'int',
		'user_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'article_id',
		'user_id',
		'text',
		'status'
	];
}
