@extends('fo.octagon_layout.octagon_master') @section('content')
<!-- ___Main Content___ -->

<div class="main-slider">
	<div class="row">
		<div class="col-md-8 no-padding">
			<!-- ___Start Slider___ -->
			<div id="slider">
				<div class="post item"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-1.jpg') }}" alt="" />
					<div class="carousel-caption"> <span>Jan 20, 2015</span>
						<h3>COUPLE CYCLE RIDE ON ROAD</h3> </div>
				</div>
				<!-- End Post Item -->
				<div class="post item"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-2.jpg') }}" alt="" />
					<div class="carousel-caption"> <span>Jan 20, 2015</span>
						<h3>COUPLE CYCLE RIDE ON ROAD</h3> </div>
				</div>
				<!-- End Post Item -->
				<div class="post item"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-3.jpg') }}" alt="" />
					<div class="carousel-caption"> <span>Jan 20, 2015</span>
						<h3>COUPLE CYCLE RIDE ON ROAD</h3> </div>
				</div>
				<!-- End Post Item -->
				<div class="post item"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-4.jpg') }}" alt="" />
					<div class="carousel-caption"> <span>Jan 20, 2015</span>
						<h3>COUPLE CYCLE RIDE ON ROAD</h3> </div>
				</div>
				<!-- End Post Item -->
				<div class="post item"> <img class="img-responsive" src="{{ asset('img/octagon/slider/slider-5.jpg') }}" alt="" />
					<div class="carousel-caption"> <span>Jan 20, 2015</span>
						<h3>COUPLE CYCLE RIDE ON ROAD</h3> </div>
				</div>
				<!-- End Post Item -->
			</div>
			<!-- End Slider -->
		</div>
		<!-- End Column -->
		<!-- ___Slider Side Post___ -->
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
				<!-- End Post -->
			</div>
			<!-- End Slider Side Post -->
		</div>
		<!-- End Column -->
	</div>
	<!-- End Row -->
</div>
<!-- End Main Slider -->@if(isset($recursos) && !empty($recursos))
<div class="col-md-9 w-100" style="margin-top:8%; margin-top: 8%; width: 79%; margin-left: -4.7%;">
	<div class="row"> @foreach($recursos as $recurso) @include('fo.octagon_layout.octagon_content.octagon_recurso') @endforeach </div>
</div> @else No hay recusos disponibles @endif
<div class="text-center">
	<div class="col-md-3 w-50" style="margin-top:8%; margin-left: -4.5%; width: 30%;">
		<!-- ___Start Sidebar___ -->
		<div class="sidebar">
			<!--div class="block-shadow">
				<div class="rt-block">
					<div class="module-title">
						<div class="module-title2">
							<div class="module-title3">
								<h2 class="title" style="visibility: visible;"><span>Propers</span> esdeveniments</h2>
								<div class="accent"></div>
							</div>
						</div>
					</div>
					<div class="module-content">
						<div class="rokminievents3" data-rokminievents3="{&quot;id&quot;:&quot;255&quot;,&quot;pages&quot;:7}" data-rokminievents3-id="255">
							<ul class="rme-items cols-4">
								<li class="rme-item">
									<div class="rme-badge"> <span class="rme-day">17</span> <span class="rme-month">març</span> </div>
									<div class="rme-description"> <a class="rme-title" href="https://www.google.com/calendar/event?eid=ZjhucDJxdnFuMXViZmxoajJyMWNidTFwNWsgaDJnNjMydWhpbGFqOTY0dG9hNHU5dGZibGtAZw">GS Taller Ioga</a> <span class="rme-date">17 març 2017</span> <span class="rme-time">All Day</span>
										<p class="rme-details"></p>
									</div>
								</li>
								<li class="rme-item">
									<div class="rme-badge"> <span class="rme-day">17</span> <span class="rme-month">març</span> </div>
									<div class="rme-description"> <a class="rme-title" href="https://www.google.com/calendar/event?eid=aHZzY2l2ODJpdnJwamY1Ymc0MmtnY2ZxZDhfMjAxNzAzMTcgaDJnNjMydWhpbGFqOTY0dG9hNHU5dGZibGtAZw">GM Entrevistes tutorials</a> <span class="rme-date">17 març 2017</span> <span class="rme-time">All Day</span>
										<p class="rme-details"></p>
									</div>
								</li>
								<li class="rme-item">
									<div class="rme-badge"> <span class="rme-day">17</span> <span class="rme-month">març</span> </div>
									<div class="rme-description"> <a class="rme-title" href="https://www.google.com/calendar/event?eid=cWV0cGZjZmUzajdrdDdzNnMzYnJhOXBrdTRfMjAxNzAzMTcgaDJnNjMydWhpbGFqOTY0dG9hNHU5dGZibGtAZw">MJS-TEATRE Assaig General</a> <span class="rme-date">17 març 2017</span> <span class="rme-time">All Day</span>
										<p class="rme-details"></p>
									</div>
								</li>
								<li class="rme-item">
									<div class="rme-badge"> <span class="rme-day">17</span> <span class="rme-month">març</span> </div>
									<div class="rme-description"> <a class="rme-title" href="https://www.google.com/calendar/event?eid=aG4zMHFocXRvbWhocjdiYzI0am4xNW5jZmtfMjAxNzAzMTcgaDJnNjMydWhpbGFqOTY0dG9hNHU5dGZibGtAZw">BAT Entrevistes tutorials</a> <span class="rme-date">17 març 2017</span> <span class="rme-time">All Day</span>
										<p class="rme-details"></p>
									</div>
								</li>
							</ul>
							<div class="rme-timeline arrows-on">
								<div class="rme-timeline-bar">
									<ul class="rme-timeline-points cols-7">
										<li class="rme-timeline-point active" data-rokminievents3-page="1"> <span></span>
											<div class="rme-timeline-date">17 març - 18 març</div>
										</li>
										<li class="rme-timeline-point" data-rokminievents3-page="2"> <span></span>
											<div class="rme-timeline-date">18 març - 21 març</div>
										</li>
										<li class="rme-timeline-point" data-rokminievents3-page="3"> <span></span>
											<div class="rme-timeline-date">21 març - 22 març</div>
										</li>
										<li class="rme-timeline-point" data-rokminievents3-page="4"> <span></span>
											<div class="rme-timeline-date">22 març - 22 març</div>
										</li>
										<li class="rme-timeline-point" data-rokminievents3-page="5"> <span></span>
											<div class="rme-timeline-date">23 març - 24 març</div>
										</li>
										<li class="rme-timeline-point" data-rokminievents3-page="6"> <span></span>
											<div class="rme-timeline-date">24 març - 26 març</div>
										</li>
										<li class="rme-timeline-point" data-rokminievents3-page="7"> <span></span>
											<div class="rme-timeline-date">25 març - 26 març</div>
										</li>
									</ul>
								</div> <span data-rokminievents3-previous="" class="rme-arrow left">‹</span> <span data-rokminievents3-next="" class="rme-arrow right">›</span> </div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div--><a class="twitter-timeline" data-lang="ca" data-width="700" data-height="600" data-theme="light" data-link-color="#E81C4F" href="https://twitter.com/xribas360" style="margin-left:8%">Tweets by TSFI</a>
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
			<!-- ___Start Archive___ -->
			<div class="sidebar-widget sidebar-archive">
				<h3>Archive</h3>
				<div class="custom-select">
					<select class="form-control no-radius">
						<option>Select Month</option>
						<option>January</option>
						<option>February</option>
						<option>March</option>
						<option>April</option>
						<option>May</option>
						<option>June</option>
						<option>July</option>
						<option>August</option>
						<option>September</option>
						<option>October</option>
						<option>November</option>
						<option>December</option>
					</select>
				</div>
			</div>
			<!-- End sidebar-archive-->
			<div class="sidebar-widget sidebar-ads"> <img class="img-responsive" src="{{ asset('img/octagon/widget/side-bar-ads.jpg') }}" alt="" /> </div>
			<!-- ___Start Subscribe___ -->
			<div class="sidebar-widget sidebar-subscribe">
				<div class="mail text-center"> <i class="pe-7s-mail"></i> </div>
				<h3>get our latest article</h3>
				<div class="form-group">
					<input type="text" class="form-control no-radius" placeholder="Email Address" />
					<div class="subscribe-btn text-right"> <a href="#0">Subscribe</a> </div>
				</div>
			</div>
			<!-- End Subscribe -->
		</div>
	</div>
</div> @endsection