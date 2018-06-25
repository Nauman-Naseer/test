@extends('blog.app')

@section('content')

	<article>
		<div class="container-fluid">
			<div class="row">


				<div class="col-md-8">

					<div class="row">

						<!-- start full blog -->
						@foreach($user_blogs as $blogsss)
							<?php 
								$user = App\User::where('name', $blogsss->name)->first();
					            $users = App\Models\Blog\Blog::orderBy('created_at', 'desc')->where('user_id', $user->id)->get()->take(5); 
							?>
							@foreach($users as $blog)
								<div class="full">
									<div class="full-blog col-md-5">
										<a href="#"><img src="@if($blog->image){{ url('poster/'. $blog->image) }}@else {{ url('img/'. 'default.jpg') }} @endif" alt="bloger"></a>
									</div>
									<div class="blog-detail col-md-7">
										<h2><a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}">{!! blog($blog->title, 30) !!}</a></h2>
										{!! blog($blog->blog, 60) !!}
										<div class="icon">
											<?php 
												$user_name=\Illuminate\Foundation\Auth\User::find($blog->user_id) ? \Illuminate\Foundation\Auth\User::find($blog->user_id)->name : '';
											?>
											<a href="{{ url('blogs/'. $user_name  ) }}"><i class="fa fa-user" aria-hidden="true">  {{ $user_name }}</i></a>
											<a href="#"><i class="fa fa-clock-o" aria-hidden="true"> {{ date('j F Y', strtotime($blog->created_at) )}}</i></a>
											<a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}#comment"><i class="fa fa-comments-o" aria-hidden="true"> Comments</i></a>
										</div>
									</div>
								</div>
							@endforeach
						@endforeach
					</div>

				</div>


				<!--   start sidebar -->

				<div class="col-md-4">
					<div class="about">
						<h3>About Author</h3>
					</div>
					<?php $about_img = configValue('about_img'); ?>
					@if($about_img)
						<?php $blog4 = \App\Models\Blog\Blog::find($about_img); ?>
						<div class="blogar" >
							<a href="{{ url('blogs/'. $blog4->id .'/'. str_replace('+','-', urlencode($blog4->title))) }}"><img src="@if($blog4->image){{ url('poster/'. $blog4->image) }}@else {{ url('img/'. 'default.jpg') }} @endif"  alt="bloger"></a>
						</div>
						<div class="about_details">
							<h2><a href="{{ url('blogs/'. $blog4->id .'/'. str_replace('+','-', urlencode($blog4->title))) }}">{!! $blog4->title !!}</a></h2>
							<p>{!! blog($blog4->blog, 50) !!}</p>
						</div>
	@endif
@endsection
