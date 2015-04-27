@extends('frontend.layout')

@section('breadcrumbs-wrapper')
@endsection

@section('content')
    <br />
    <div class="container">
        <div class="row">
            <div class="col-md-8">
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
        </div>
    </div>
@endsection

@section('script')
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