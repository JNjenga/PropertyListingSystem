@extends('layouts.client_layout')

@section('content')
<!-- Page Content -->
<div class="container">

<!-- Page Heading -->
<h1 class="my-4">Articles</h1>
<hr>
@forelse($posts as $post)
<!-- Article One -->
<div class="row">

  <div class="col">
    <h3 class="text-primary">
    <a  href="{{ route('blog.show_client', $post->blog_post_id) }}">{{ $loop->iteration }}. {{ $post->blog_post_title }}</a>
    </h3>
    <p>{!! \Illuminate\Support\Str::limit($post->blog_post_body, $limit = 150, $end = '...') !!}</p>
    <a class="btn btn-primary" href="{{ route('blog.show_client', $post->blog_post_id) }}">View Article</a>
  </div>
</div>
<!-- /.row -->

<hr>
@empty

<div class="container ml-20">
<h4 class="text-muted"><i>There are no articles at the moments<i></h4>
</div>
@endforelse


<!-- Pagination -->
{{ $posts->links() }}


</div>
<!-- /.container -->
</div>
@endsection
