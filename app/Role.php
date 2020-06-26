<?php

/**
 * Created by Reliese Model.
 */

namespace App;

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
 * @package App
 */
class Role extends Model
{
	protected $table = 'tbl_roles';
	protected $primaryKey = 'role_id';
	protected $perPage = 5;

	protected $fillable = [
		'role_title'
	];
}
