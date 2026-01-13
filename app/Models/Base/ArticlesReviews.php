<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticlesReviews
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $article_id
 * @property string|null $review
 * @property int $rating
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Base
 */
class ArticlesReviews extends Model
{
	protected $connection = 'mysql';
	protected $table = 'articles_reviews';

	protected $columns = [
		'id',
		'user_id',
		'article_id',
		'review',
		'rating',
		'status',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'user_id' => 'int',
		'article_id' => 'int',
		'rating' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_id',
		'article_id',
		'review',
		'rating',
		'status'
	];
}
