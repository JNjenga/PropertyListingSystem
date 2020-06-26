<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogCategory
 * 
 * @property int $blog_category_id
 * @property string $blog_category_title
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|BlogPost[] $blog_posts
 *
 * @package App\Models
 */
class BlogCategory extends Model
{
	protected $table = 'tbl_blog_categories';
	protected $primaryKey = 'blog_category_id';
	protected $perPage = 5;

	protected $fillable = [
		'blog_category_title'
	];

	public function blog_posts()
	{
		return $this->hasMany(BlogPost::class, 'fk_blog_cateogory_id');
	}
}
