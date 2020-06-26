@extends('layouts.client_layout')

@section('content')
<!-- Page Content -->
<div class="container">

<!-- Page Heading -->
<h1 class="my-4 text-primary">{{ $blogpost->blog_post_title }}</h1>
<p class="my-4 text-muted font-italic">{{ $blogpost->created_at->format('j F Y') }}</h1>
<hr>
<!-- Article One -->
<div class="row">

  <div class="col">
    <p>{!! $blogpost->blog_post_body !!}</p>
  </div>
</div>
<!-- /.row -->

<hr>

</div>
<!-- /.container -->
</div>
@endsection
