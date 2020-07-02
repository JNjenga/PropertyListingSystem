<?php

/**
 * Created by Reliese Model.
 */

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * 
 * @property int $id
 * @property int $property_id
 * @property int $seen
 * @property int $read
 * @property string $customer_email
 * @property string $message
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Property $property
 * @property User $user
 *
 * @package App
 */
class Message extends Model
{
	protected $table = 'tbl_messages';
	protected $perPage = 5;

	protected $casts = [
		'property_id' => 'int',
		'seen' => 'int',
		'read' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'property_id',
		'seen',
		'read',
		'customer_email',
		'message',
		'user_id'
	];

	public function property()
	{
		return $this->belongsTo(Property::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
