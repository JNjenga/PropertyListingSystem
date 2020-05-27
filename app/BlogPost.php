<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
	//
	protected $table = 'tbl_blog_post';
	protected $primaryKey = 'blog_post_id';

	protected $fillable = ['blog_post_title'];

	public function category()
	{
		return $this->belongsTo('App\BlogCategory', 'fk_category_id');
	}
}
