<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyCategory
 * 
 * @property int $property_category_id
 * @property string $property_category_title
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Property[] $properties
 *
 * @package App\Models
 */
class PropertyCategory extends Model
{
	protected $table = 'tbl_property_categories';
	protected $primaryKey = 'property_category_id';
	public $incrementing = false;
	protected $perPage = 5;

	protected $casts = [
		'property_category_id' => 'int'
	];

	protected $fillable = [
		'property_category_title'
	];

	public function properties()
	{
		return $this->hasMany(Property::class, 'fk_property_category');
	}
}
