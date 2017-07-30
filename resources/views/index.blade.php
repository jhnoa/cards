<!DOCTYPE html>
<html>
  <head>
    <title>Magic: The Gathering - Card Database</title>
    @include('layouts.meta')
  </head>
  <body>
  	@include('layouts.header')

    <div class="page-content">
    	<div class="row">
		  @include('layouts.nav')
		  <div class="parallax"></div>
		  <div class="col-md-10">
		  	@if($detail['use'] === true)
		  	<div class="row content-box-large" style="height:100%; width: 100%;">
		  		<div class="col-md-12" style="object-fit: none;">
		  			<!-- <object data="{{ route('viewCard',['soi','123']) }}" width="100%"></object> --> 
		  			<iframe src="{{ route('viewCard',[$detail['print'],$detail['number']]) }}" style="width: 100%; height: 85vh; position: relative; border: none;" ></iframe>
		  		</div>
		  	</div>
		  	@endif

		  	<div class="row content-box-large">
		  		<div class="row">
		  			<div class="col-md-12 text-center">
		  				<h3>Random Cards</h3>
		  			</div>
				</div>
				<div class="row">
					@foreach($urls as $url)
						<div class="col-md-2 col-sm 6 well" style="margin: 2em">
							<a href="{{ route('index',[$url[0]['sets'], $url[0]['setnumber']]) }}">
								<img src="http://magiccards.info/scans/en/{{$url[0]['sets']}}/{{$url[0]['setnumber']}}.jpg" onerror="this.src='https://upload.wikimedia.org/wikipedia/en/a/aa/Magic_the_gathering-card_back.jpg'" width="100%">
								<h6>{{$url[0]['name']}}</h6>
							</a>
						</div>
					@endforeach
					<div class="col-md-3 col-sm 6"></div>
				</div>
		  	</div>
		  	
			  	<!-- <div class="col-sm-3">
					<img src="http://magiccards.info/scans/en/soi/123.jpg" id>		  		
			  	
			  	</div> -->
		  		<!-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
					  <ol class="carousel-indicators">
					    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					    <li data-target="#myCarousel" data-slide-to="1"></li>
					    <li data-target="#myCarousel" data-slide-to="2"></li>
					    <li data-target="#myCarousel" data-slide-to="3"></li>
					  </ol>

						  <div class="carousel-inner">
						    <div class="item active">
						      <img class="img-responsive center-block" src="http://magiccards.info/scans/en/soi/123.jpg" alt="Chania"> -->
<!-- 						      <div class="carousel-caption">
						        <h3>Los Angeles</h3>
						        <p>LA is always so much fun!</p>
						      </div> -->
						  <!--   </div>

						    <div class="item"> -->
						      <!-- <img class="img-responsive center-block" src="http://magiccards.info/scans/en/soi/125.jpg" alt="Chicago"> -->
<!-- 						      <div class="carousel-caption">
						        <h3>Chicago</h3>
						        <p>Thank you, Chicago!</p>
						      </div> -->
						    <!-- </div>

						    <div class="item">
						      <img class="img-responsive center-block" src="http://magiccards.info/scans/en/soi/127.jpg" alt="New York"> -->
<!-- 						      <div class="carousel-caption">
						        <h3>New York</h3>
						        <p>We love the Big Apple!</p>
						      </div>
 -->						    <!-- </div>

						    <div class="item">
						    	<img class="img-responsive center-block" src="https://upload.wikimedia.org/wikipedia/en/a/aa/Magic_the_gathering-card_back.jpg" alt="No Image">
						    	<div class="carousel-caption">
						    		
						    	</div>
						    </div>

						  </div>

					  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div> -->
		  </div>
		</div>
    </div>
    <br>
	<div class="parallax"></div>
    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/custom.js') }}"></script>
  </body>
</html>