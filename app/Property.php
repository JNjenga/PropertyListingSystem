<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 * 
 * @property int $property_id
 * @property string $title
 * @property int $status
 * @property float $price
 * @property string $description
 * @property int|null $bedrooms
 * @property int|null $bathrooms
 * @property string $type
 * @property int $fk_property_category_id
 * @property int $fk_county_id
 * @property int $fk_user_id
 * @property string $location
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property County $county
 * @property PropertyCategory $property_category
 * @property User $user
 * @property Collection|Image[] $images
 *
 * @package App
 */
class Property extends Model
{
	protected $table = 'tbl_properties';
	protected $primaryKey = 'property_id';
	protected $perPage = 5;

	protected $casts = [
		'status' => 'int',
		'price' => 'float',
		'bedrooms' => 'int',
		'bathrooms' => 'int',
		'fk_property_category_id' => 'int',
		'fk_county_id' => 'int',
		'fk_user_id' => 'int'
	];

	protected $fillable = [
		'title',
		'status',
		'price',
		'description',
		'bedrooms',
		'bathrooms',
		'type',
		'fk_property_category_id',
		'fk_county_id',
		'fk_user_id',
		'location'
	];

	public function county()
	{
		return $this->belongsTo(County::class, 'fk_county_id');
	}

	public function property_category()
	{
		return $this->belongsTo(PropertyCategory::class, 'fk_property_category_id');
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
