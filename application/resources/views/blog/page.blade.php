@extends('blog.app')

@section('content')
	
      



	<article>
		<div class="container-fluid">
			<div class="row">


				<div class="col-md-8">		   

			<!-- start celebraty -->
					<div class="celebraty">
						<div class="">
							<a href="#"><img src="@if($singleBlog->image){{ url('poster/'. $singleBlog->image) }}@else {{ url('img/'. 'default.jpg') }} @endif"  alt="bloger"></a>
						</div>
						<div class="about_details">
							<h2><a href="#">{{ $singleBlog->title }}</a></h2>
							{!! $singleBlog->blog !!}
							
							<div class="single_icon">
								<a href="{{ url('blogs/'.$user->name) }}"><i class="fa fa-user" aria-hidden="true">  {!! !empty($user) ? $user->name : ''  !!}</i></a>
								<a href="#"><i class="fa fa-clock-o" aria-hidden="true">  {{ date('j F Y', strtotime($singleBlog->created_at) )}}</i></a>
								<a href="#"><i class="fa fa-comments-o" aria-hidden="true"> Comments</i></a>
							</div>
						</div>
					</div>

					{{--Advertisement--}}

					{!! basic('single') !!}




					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_native_toolbox" style="margin-top: 50px;"></div>


					<div class="about" id="comment">
								<h3>Post Comment</h3>
					</div>

					<div id="disqus_thread"></div>
						<script>
						/**
						* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
						* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
						*/
						
						var disqus_config = function () {
						this.page.url = '<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>'; // Replace PAGE_URL with your page's canonical URL variable
						this.page.identifier = '<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
						};
						
							(function() { // DON'T EDIT BELOW THIS LINE
							var d = document, s = d.createElement('script');

							s.src = '//{!! basic('disqus') !!}.disqus.com/embed.js';

							s.setAttribute('data-timestamp', +new Date());
							(d.head || d.body).appendChild(s);
							})();
						</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
				
						
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
