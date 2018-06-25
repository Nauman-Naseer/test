@extends('blog.app')

@section('content')
   



	<article>
		<div class="container-fluid">
			<div class="row">


				<div class="col-md-8">		   

			<!-- start celebraty -->
					<div class="celebraty">
						<div class="">
							@if($singlepage->image)<a href="#"><img src="{{ url('poster/'. $singlepage->image) }} "  alt="page" style="max-height:400px"></a>@endif
						</div>
						<div class="about_details">
							<h2><a href="">{{ $singlepage->title }}</a></h2>
							{!! $singlepage->blog !!}
							
							
						</div>
					</div>





					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_native_toolbox" style="margin-top: 50px;"></div>


					

						
				
						
				</div>


            <!--   start sidebar -->
                    
                    <div class="col-md-4">
                        <div class="about">
                            <h3>About Us</h3>
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
