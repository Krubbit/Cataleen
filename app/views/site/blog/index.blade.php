@extends('site.layouts.default')
@section('contentout')
<!-- Jumbotron -->
	<div class="jumbotron jumbotron-index" style="margin-bottom:-50px;">
      <div class="container">
        <h1>El Gran Gatsby</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, eius, sint voluptatibus voluptatem animi beatae quo explicabo possimus amet nobis quibusdam vero facilis temporibus quia ab repellendus nam. Aliquam, dignissimos.</p>
        <a class="btn btn-red btn-lg" role="button">Ver pelicula »</a>
      </div>
    </div>
<!-- ./Jumbotron -->

@stop
{{-- Content --}}
@section('content')
<!-- Noticias -->
<h3><i class="glyphicon glyphicon-globe yellow"></i> Ultimas Noticias</h3>
<div class="row">
@foreach ($posts as $post)
	<div class="col-md-4">
		<!-- Post Title -->
		<div class="row">
			<div class="col-md-10">
				<h4><strong><a href="{{{ $post->url() }}}">{{ substr(String::title($post->title), 0,30) }}...</a></strong></h4>
			</div>
		</div>
		<!-- ./ post title -->

		<!-- Post Content -->
		<div class="row">
			<div class="col-md-12">
				<a href="{{{ $post->url() }}}" class="thumbnail"><img style="width:600px;height:180px;" src="http://placehold.it/600x280" alt=""></a>
			</div>
			<br>
			<div class="col-md-12">
				<p></p>
				<p>
					<span class="glyphicon glyphicon-user"></span> Por <span class="muted">{{{ $post->author->username }}}</span>
					| <span class="glyphicon glyphicon-calendar"></span> <!--Sept 16th, 2012-->{{{ $post->date() }}}
					| <span class="glyphicon glyphicon-comment"></span> <a href="{{{ $post->url() }}}#comments">{{$post->comments()->count()}} {{ \Illuminate\Support\Pluralizer::plural('Comentario', $post->comments()->count()) }}</a>
				</p>
			</div>
			<br>
			<div class="col-md-12">
				<p>
					{{ String::tidy(Str::limit($post->content, 200)) }}
				</p>
				<p><a class="leer-mas" href="{{{ $post->url() }}}">Leer mas »</a></p>
			</div>
		</div>
		<!-- ./ post content -->

	</div>
@endforeach
</div>

{{ $posts->links() }}

@stop
