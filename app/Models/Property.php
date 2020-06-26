<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 * 
 * @property int $property_id
 * @property string $title
 * @property int $status
 * @property string $description
 * @property int|null $bedrooms
 * @property int|null $bathrooms
 * @property string $type
 * @property int $fk_property_category
 * @property int $fk_county_id
 * @property string $location
 * @property int $fk_user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property PropertyCategory $property_category
 * @property County $county
 * @property User $user
 * @property Collection|Image[] $images
 *
 * @package App\Models
 */
class Property extends Model
{
	protected $table = 'tbl_properties';
	protected $primaryKey = 'property_id';
	public $incrementing = false;
	protected $perPage = 5;

	protected $casts = [
		'property_id' => 'int',
		'status' => 'int',
		'bedrooms' => 'int',
		'bathrooms' => 'int',
		'fk_property_category' => 'int',
		'fk_county_id' => 'int',
		'fk_user_id' => 'int'
	];

	protected $fillable = [
		'title',
		'status',
		'description',
		'bedrooms',
		'bathrooms',
		'type',
		'fk_property_category',
		'fk_county_id',
		'location',
		'fk_user_id'
	];

	public function property_category()
	{
		return $this->belongsTo(PropertyCategory::class, 'fk_property_category');
	}

	public function county()
	{
		return $this->belongsTo(County::class, 'fk_county_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'fk_user_id');
	}

	public function images()
	{
		return $this->hasMany(Image::class, 'fk_property_id');
	}
}
