<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Users
 * 
 * @property int $id
 * @property string|null $username
 * @property string|null $email
 * @property Carbon|null $email_verified_at
 * @property int|null $phone
 * @property Carbon|null $phone_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property string|null $language
 * @property float $balance
 * @property Carbon|null $actions_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Users extends User
{
	use HasFactory;
	use Notifiable;
	use HasRoles;
	protected $connection = 'mysql';
	protected $table = 'users';

	protected $columns = [
		'id',
		'username',
		'email',
		'email_verified_at',
		'phone',
		'phone_verified_at',
		'password',
		'remember_token',
		'language',
		'balance',
		'actions_at',
		'created_at',
		'updated_at'
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
		'phone' => 'int',
		'phone_verified_at' => 'datetime',
		'balance' => 'float',
		'actions_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'username',
		'email',
		'email_verified_at',
		'phone',
		'phone_verified_at',
		'password',
		'remember_token',
		'language',
		'balance',
		'actions_at'
	];
}
