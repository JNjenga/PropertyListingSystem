<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * 
 * @property int $image_id
 * @property string $image_path
 * @property int $fk_property_id
 * @property Carbon $created_at
 * @property Carbon $update_at
 * 
 * @property Property $property
 *
 * @package App\Models
 */
class Image extends Model
{
	protected $table = 'tbl_images';
	protected $primaryKey = 'image_id';
	public $incrementing = false;
	protected $perPage = 5;
	public $timestamps = false;

	protected $casts = [
		'image_id' => 'int',
		'fk_property_id' => 'int'
	];

	protected $dates = [
		'update_at'
	];

	protected $fillable = [
		'image_path',
		'fk_property_id',
		'update_at'
	];

	public function property()
	{
		return $this->belongsTo(Property::class, 'fk_property_id');
	}
}
