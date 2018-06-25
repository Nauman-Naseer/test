@extends('blog.app')

@section('content')
	
	<article>
		<div class="container-fluid">
			<div class="row">


				<div class="col-md-8">


					@if (count($searches)==0)
						<div style="text-align:center; margin-top:50px;">
						<h2>No Blog Found....</h2>
						<h3><a href="{{ url('/') }}" style="color:green">Click  here </a> to go Home page</h3>
						</div>
					@else
					<h2>Search Result....</h2>
					@foreach($searches as $blog)
				    <div class="blog1">
						<div class="blog_image" >
							<a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}"><img src="@if($blog->image){{ url('poster/'. $blog->image) }}@else {{ url('img/'. 'default.png') }} @endif"  alt="bloger"></a>
						</div>
						<div class="about_details">

							<h2><a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}">{{$blog->title}}</a></h2>
									{!! $blog->blog !!}

							<div class="icon">
								<a href="#"><i class="fa fa-user" aria-hidden="true">  Themes</i></a>
								<a href="#"><i class="fa fa-clock-o" aria-hidden="true">  22 may 2016</i></a>
								<a href="#"><i class="fa fa-comments-o" aria-hidden="true"> Comments</i></a>
							</div>
						</div>
					</div>
					@endforeach

					@endif
				

				</div>

				
            <!--   start sidebar -->
                    
                    <div class="col-md-4">


@endsection
