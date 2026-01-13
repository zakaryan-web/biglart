<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LanguageString
 * 
 * @property int $id
 * @property string|null $language
 * @property int|null $field_id
 * @property string|null $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class LanguageString extends Model
{
	protected $connection = 'mysql';
	protected $table = 'language_string';

	protected $columns = [
		'id',
		'language',
		'field_id',
		'value',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'field_id' => 'int'
	];

	protected $fillable = [
		'language',
		'field_id',
		'value'
	];
}
