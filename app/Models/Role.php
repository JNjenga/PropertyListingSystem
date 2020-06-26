<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $role_id
 * @property string $role_title
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'tbl_roles';
	protected $primaryKey = 'role_id';
	public $incrementing = false;
	protected $perPage = 5;

	protected $casts = [
		'role_id' => 'int'
	];

	protected $fillable = [
		'role_title'
	];
}
