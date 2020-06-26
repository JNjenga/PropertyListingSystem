<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class County
 * 
 * @property int $county_id
 * @property string $county_title
 * @property Carbon $created_at
 * @property Carbon $update_at
 * 
 * @property Collection|Property[] $properties
 *
 * @package App
 */
class County extends Model
{
	protected $table = 'tbl_counties';
	protected $primaryKey = 'county_id';
	protected $perPage = 5;
	public $timestamps = false;

	protected $dates = [
		'update_at'
	];

	protected $fillable = [
		'county_title',
		'update_at'
	];

	public function properties()
	{
		return $this->hasMany(Property::class, 'fk_county_id');
	}
}
