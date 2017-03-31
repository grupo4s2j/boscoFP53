@extends('fo.octagon_layout.octagon_master') @section('content')
<div class="main-slider">
	<div class="row">
		<div class="col-md-8 no-padding">
			<div id="slider">
				<div class="post item"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-1.jpg') }}" alt="" />
					<div class="carousel-caption"> <span>Jan 20, 2015</span>
						<h3>COUPLE CYCLE RIDE ON ROAD</h3> </div>
				</div>
				<div class="post item"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-2.jpg') }}" alt="" />
					<div class="carousel-caption"> <span>Jan 20, 2015</span>
						<h3>COUPLE CYCLE RIDE ON ROAD</h3> </div>
				</div>
				<div class="post item"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-3.jpg') }}" alt="" />
					<div class="carousel-caption"> <span>Jan 20, 2015</span>
						<h3>COUPLE CYCLE RIDE ON ROAD</h3> </div>
				</div>
				<div class="post item"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-4.jpg') }}" alt="" />
					<div class="carousel-caption"> <span>Jan 20, 2015</span>
						<h3>COUPLE CYCLE RIDE ON ROAD</h3> </div>
				</div>
				<div class="post item"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-5.jpg') }}" alt="" />
					<div class="carousel-caption"> <span>Jan 20, 2015</span>
						<h3>COUPLE CYCLE RIDE ON ROAD</h3> </div>
				</div>
			</div>
		</div>
		<div class="col-md-4 no-padding">
			<div class="slider-side-post">
				<div class="post"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-sp-1.jpg') }}" alt="" />
					<div class="post-info"> <span class="mobile-bg">Jan 20, 2016</span>
						<h3>NEW NEXUS TAB RELEASED ON NEXT WEAK</h3> </div>
				</div>
				<!-- End Post -->
				<div class="post"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-sp-2.jpg') }}" alt="" />
					<div class="post-info"> <span class="lifestyle-bg">Jan 20, 2016</span>
						<h3>NEW NEXUS TAB RELEASED ON NEXT WEAK</h3> </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-post-body">
	<div class="row">
		<div class="col-md-9 no-padding w-100"> 
			@if(isset($recursos) && !empty($recursos) && count($recursos) >= 1)
			<div class="col-md-12 w-100"> 
				@php $i = 0 
				@endphp 
				@foreach($recursos as $recurso) 
				@if($i == 0)
				<div class="row"> 
					@endif 
					@include('fo.octagon_layout.octagon_content.octagon_recurso') 
					@if($i == 1) 
				</div> 
				@endif 
				@php $i == 1 ? $i = 0 : $i++ 
				@endphp 
				@endforeach 
			</div> 
			@else 
				No hay recusos disponibles 
			@endif 
		</div>
		
		<div class="text-center">
			<div class="col-md-3 w-50">
				<!-- ___Start Sidebar___ -->
				<div class="sidebar">
					<div id="calendar"></div> 	
					<a class="twitter-timeline" data-lang="ca" data-width="700" data-height="600" data-theme="light" data-link-color="#E81C4F" href="https://twitter.com/TSFormacioInd" style="margin-left:8%">Tweets by TSFI</a>
					<div class="" style="margin-top:10%">
						<div class="banneritem">
							<a href="home" title="sharetheligth"> <img src="http://www.salesianssarria.com/images/banners/sharethelight.jpg" alt="sharetheligth"> </a>
							<div class="clr"></div>
						</div>
						<div class="banneritem">
							<a href="home" title="btx_internacional"> <img src="http://www.salesianssarria.com/images/banners/btx_ib.jpg" alt="btx_internacional"> </a>
							<div class="clr"></div>
						</div>
						<div class="banneritem">
							<a href="home" title="MJS"> <img src="http://www.salesianssarria.com/images/banners/mjs.jpg" alt="MJS" width="250" height="50"> </a>
							<div class="clr"></div>
						</div>
						<div class="banneritem">
							<a href="home" title="Blog D'art"> <img src="http://www.salesianssarria.com/images/banners/blog_dart.jpg" alt="Blog d'art"> </a>
							<div class="clr"></div>
						</div>
						<div class="banneritem">
							<a href="home" title="memoria 2017"> <img src="http://www.salesianssarria.com/images/banners/memoria_2017.jpg" alt="memoria 2017"> </a>
							<div class="clr"></div>
						</div>
					</div>
					<div class="sidebar-widget sidebar-tab">
						<div role="tabpanel">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">Popular</a></li>
								<li role="presentation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
								<li role="presentation"><a href="#tag" aria-controls="tag" role="tab" data-toggle="tab">Tag</a></li>
							</ul>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="popular">
									<ul>
										<li>
											<div class="media">
												<div class="media-body media-left">
													<h3>travel experience sahara desert</h3> <span>Jan 20, 2015</span>
													<p class="travel-color">Travel</p>
												</div>
												<div class="media-right"> <img class="img-responsive" src="/img/octagon/widget/widget-tag-1.jpg" alt=""> </div>
											</div>
										</li>
										<li>
											<div class="media">
												<div class="media-body media-left">
													<h3>Now get a stranger to wake you up </h3> <span>Jan 20, 2015</span>
													<p class="mobile-color">Mobile</p>
												</div>
												<div class="media-right"> <img class="img-responsive" src="/img/octagon/widget/widget-tag-2.jpg" alt=""> </div>
											</div>
										</li>
										<li>
											<div class="media">
												<div class="media-body media-left">
													<h3>Kids must vision check-up regularly</h3> <span>Jan 20, 2015</span>
													<p class="health-color">Health</p>
												</div>
												<div class="media-right"> <img class="img-responsive" src="/img/octagon/widget/widget-tag-3.jpg" alt=""> </div>
											</div>
										</li>
									</ul>
								</div>
			
								<div role="tabpanel" class="tab-pane fade" id="video">
									<ul>
										<li>
											<div class="media">
												<div class="media-body media-left">
													<h3>Now get a stranger to wake you up </h3> <span>Jan 20, 2015</span>
													<p class="mobile-color">Mobile</p>
												</div>
												<div class="media-right"> <img class="img-responsive" src="/img/octagon/widget/widget-tag-3.jpg" alt=""> </div>
											</div>
											<!-- End Media -->
										</li>
										<li>
											<div class="media">
												<div class="media-body media-left">
													<h3>travel experience sahara desert</h3> <span>Jan 20, 2015</span>
													<p class="travel-color">Travel</p>
												</div>
												<div class="media-right"> <img class="img-responsive" src="/img/octagon/widget/widget-tag-1.jpg" alt=""> </div>
											</div>
											<!-- End Media -->
										</li>
										<li>
											<div class="media">
												<div class="media-body media-left">
													<h3>Kids must vision check-up regularly</h3> <span>Jan 20, 2015</span>
													<p class="health-color">Health</p>
												</div>
												<div class="media-right"> <img class="img-responsive" src="/img/octagon/widget/widget-tag-2.jpg" alt=""> </div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					
					<div class="sidebar-widget sidebar-about">
						<h3>About Octagon</h3>
						<div class="about-image"> <img class="img-responsive" src="/img/octagon/widget/sidebar-about.jpg" alt="" /> </div>
						<p>Octagon is one of the excellent blog in the World, Because Octogon Have an Uniqe and interesting post. so It give Treat for visiters eyes.</p>
					</div>
					<div class="sidebar-widget sidebar-slider">
						<div id="sidebar-slide-post" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<div class="item active"> <img class="img-responsive" src="/img/octagon/widget/sidebar-slider-1.jpg" alt=""> </div>
								<div class="item"> <img class="img-responsive" src="/img/octagon/widget/sidebar-slider-2.jpg" alt=""> </div>
								<div class="item"> <img class="img-responsive" src="/img/octagon/widget/sidebar-slider-3.jpg" alt=""> </div>
							</div>
							<div class="slider-controls">
								<a class="left carousel-control" href="#sidebar-slide-post" role="button" data-slide="prev"> <i class="fa fa-angle-left"></i> </a>
								<a class="right carousel-control" href="#sidebar-slide-post" role="button" data-slide="next"> <i class="fa fa-angle-right"></i> </a>
							</div>
						</div>
					</div>
					
					<div class="sidebar-widget sidebar-archive">
						<h3>Archive</h3>
						<div class="custom-select">
							<select class="form-control no-radius">
								<option>Select Month</option>
								<option>January</option>
								<option>February</option>
							</select>
						</div>
					</div>
					<div class="sidebar-widget sidebar-ads"> <img class="img-responsive" src="/img/octagon/widget/side-bar-ads.jpg" alt="" /> </div>
					<div class="sidebar-widget sidebar-subscribe">
						<div class="mail text-center"> <i class="pe-7s-mail"></i> </div>
						<h3>get our latest article</h3>
						<div class="form-group">
							<input type="text" class="form-control no-radius" placeholder="Email Address" />
							<div class="subscribe-btn text-right"> <a href="#0">Subscribe</a> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> @endsection