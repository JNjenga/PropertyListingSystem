<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogPost
 * 
 * @property int $blog_post_id
 * @property string $blog_post_title
 * @property string $blog_post_body
 * @property int $fk_blog_cateogory_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $publish
 * 
 * @property BlogCategory $blog_category
 *
 * @package App\Models
 */
class BlogPost extends Model
{
	protected $table = 'tbl_blog_post';
	protected $primaryKey = 'blog_post_id';
	public $incrementing = false;
	protected $perPage = 5;

	protected $casts = [
		'blog_post_id' => 'int',
		'fk_blog_cateogory_id' => 'int',
		'publish' => 'int'
	];

	protected $fillable = [
		'blog_post_title',
		'blog_post_body',
		'fk_blog_cateogory_id',
		'publish'
	];

	public function blog_category()
	{
		return $this->belongsTo(BlogCategory::class, 'fk_blog_cateogory_id');
	}
}
