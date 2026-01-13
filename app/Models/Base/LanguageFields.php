<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LanguageFields
 * 
 * @property int $id
 * @property string|null $key
 * @property string|null $description
 * @property string|null $default_value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class LanguageFields extends Model
{
	protected $connection = 'mysql';
	protected $table = 'language_fields';

	protected $columns = [
		'id',
		'key',
		'description',
		'default_value',
		'created_at',
		'updated_at'
	];

	protected $fillable = [
		'key',
		'description',
		'default_value'
	];
}
