<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
	//
	protected $table = 'tbl_blog_category';
	protected $primaryKey = 'blog_category_id';

	public function posts()
	{
		return $this->hasMany('App\BlogPost', 'fk_category_id');
	}
}
