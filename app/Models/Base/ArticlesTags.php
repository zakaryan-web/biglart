<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticlesTags
 * 
 * @property int $id
 * @property int|null $article_id
 * @property int|null $tag_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class ArticlesTags extends Model
{
	protected $connection = 'mysql';
	protected $table = 'articles_tags';

	protected $columns = [
		'id',
		'article_id',
		'tag_id',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'article_id' => 'int',
		'tag_id' => 'int'
	];

	protected $fillable = [
		'article_id',
		'tag_id'
	];
}
