<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticlesViews
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $article_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class ArticlesViews extends Model
{
	protected $connection = 'mysql';
	protected $table = 'articles_views';

	protected $columns = [
		'id',
		'user_id',
		'article_id',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'article_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'article_id'
	];
}
