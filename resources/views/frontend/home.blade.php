@extends('frontend.layout')

@section('breadcrumbs-wrapper')
@endsection

@section('content')
	@include('frontend.slider')

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2>{{ Lang::get('products.latest_products') }}</h2>
				<hr/>

				<div class="row no-margin">
					@foreach($products as $product)
						<div class="col-md-2 product_wrapper third-width">
							<div class="product_image">
								<div class="wrapper">
									<a class="bloc" href="{{ action('ProductsController@show', $product->id) }}">
										<img src="{{ $product->image_path }}" />
									</a>
								</div>
							</div>
							<div class="product_details">
								<div class="col-md-6 no-padding">
									<div class="col-md-12">
										<a class="product_name" href="{{ action('ProductsController@show', $product->id) }}">{{ $product->name }}</a>
									</div>
									<div class="col-md-12">
										<span class="product_price">{{ $product->productPrice->first()->retail_price }}</span>
									</div>
								</div>

								<div class="col-md-6 no-padding">
									{!! Form::open(['action' => ['CartController@addItem', $product->id], 'class' => 'add-item-form']) !!}
									<input type="hidden" name="id" value="{{ $product->id }}">
									<button class="btn btn-danger" type="submit">
										<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;
										{{ Lang::get('products.add_to_cart') }}
									</button>
									{!! Form::close() !!}
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>

			<div class="col-md-4">
				<h2>{{ Lang::get('products.popular_product') }}</h2>
				<hr/>

				<div class="row no-margin">
					@foreach($popularProducts as $product)
						<div class="col-md-12 product_wrapper full-width">
							<div class="product_image">
								<div class="wrapper">
									<a class="bloc" href="{{ action('ProductsController@show', $product->id) }}">
										<img src="{{ $product->image_path }}" />
									</a>
								</div>
							</div>
							<div class="product_details">
								<div class="col-md-6 no-padding">
									<div class="col-md-12">
										<a class="product_name" href="{{ action('ProductsController@show', $product->id) }}">{{ $product->name }}</a>
									</div>
									<div class="col-md-12">
										<span class="product_price">{{ $product->productPrice->first()->retail_price }}</span>
									</div>
								</div>

								<div class="col-md-6 no-padding">
									<button type="button" class="btn btn-danger">
										<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;
										{{ Lang::get('products.add_to_cart') }}
									</button>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h2>{{ Lang::get('products.featured_products') }}</h2>
				<hr/>

				<div class="row no-margin">
					@foreach($featuredProducts as $product)
						<div class="col-md-12 product_wrapper one-fifth-width">
							<div class="product_image">
								<div class="wrapper">
									<a class="bloc" href="{{ action('ProductsController@show', $product->id) }}">
										<img src="{{ $product->image_path }}" />
									</a>
								</div>
							</div>
							<div class="product_details">
								<div class="col-md-6 no-padding">
									<div class="col-md-12">
										<a class="product_name" href="{{ action('ProductsController@show', $product->id) }}">{{ $product->name }}</a>
									</div>
									<div class="col-md-12">
										<span class="product_price">{{ $product->productPrice->first()->retail_price }}</span>
									</div>
								</div>

								<div class="col-md-6 no-padding">
									<button type="button" class="btn btn-danger">
										<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;
										{{ Lang::get('products.add_to_cart') }}
									</button>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script src="./js/jssor.js"></script>
	<script src="./js/jssor.slider.min.js"></script>
	{!! HTML::script('js/jquery.form.min.js') !!}

	<script>
		jQuery(document).ready(function ($) {

			var ajxOptions = {
				success:       showResponse
			};

			jQuery('.add-item-form').submit(function() {
				jQuery(this).ajaxSubmit(ajxOptions);
				return false;
			});

			var _CaptionTransitions = [];
			var options = {
				$FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
				$AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
				$AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
				$PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

				$ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
				$SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
				$SlideDuration: 800,                               //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
				$MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
				//$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
				$SlideHeight: 600,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
				$SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
				$DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
				$ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
				$UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
				$PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
				$DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

				$CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
					$Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
					$CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
					$PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
					$PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
				},

				$BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
					$Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
					$ChanceToShow: 0,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
					$AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
					$Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
					$Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
					$SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
					$SpacingY: 8,                                   //[Optional] Vertical space between each item in pixel, default value is 0
					$Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
				},

				$ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
					$Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
					$ChanceToShow: 0,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
					$AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
					$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
				}
			};

			var jssor_slider1 = new $JssorSlider$("slider_container", options);

			//responsive code begin
			//you can remove responsive code if you don't want the slider scales while window resizes
			function ScaleSlider() {
				var bodyWidth = document.body.clientWidth;
				if (bodyWidth)
					jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
				else
					window.setTimeout(ScaleSlider, 30);
			}
			ScaleSlider();

			$(window).bind("load", ScaleSlider);
			$(window).bind("resize", ScaleSlider);
			$(window).bind("orientationchange", ScaleSlider);
			//responsive code end
		});

		function showResponse(responseText, statusText, xhr, $form)  {
			var response = parseInt(responseText);

			if (response > 0) {
				alert('{{Lang::get('products.items_added_to_cart')}}');
				jQuery('.count').html(response);
			}
		}
	</script>
@endsection