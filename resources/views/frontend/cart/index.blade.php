@extends('frontend.layout')

@section('breadcrumbs-wrapper')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ Lang::get('products.shopping_cart') }}</h2>
                <hr/>

                <div class="box">
                    @if (Cart::count() == 0)
                        <p>{{Lang::get('products.shopping_cart_empty')}}</p>
                    @else
                        <table id="shopping-cart-table" class="data-table cart-table table table-striped">
                            <th>
                                {{Lang::get('products.product_name')}}
                            </th>
                            <th></th>
                            <th>
                                {{Lang::get('products.unit_price')}}
                            </th>
                            <th>
                                {{Lang::get('products.qty')}}
                            </th>
                            <th>
                                {{Lang::get('products.shopping_subtotal')}}
                            </th>
                            <th></th>

                            <tbody>
                                @foreach(Cart::content() as $row)
                                    <tr id="item_{{ $row->id }}_row">
                                        <td>{{$row->name}}</td>
                                        <td></td>
                                        <td>{{$row->price}}</td>
                                        <td>
                                            {!! Form::open(['action' => ['CartController@updateItem', $row->rowid], 'class' => 'update-item-form inline', 'method' => 'PUT']) !!}
                                            <input type="hidden" name="id" value="{{ $row->rowid }}">
                                            <input type="number" name="qty" min="0" size="4" value="{{$row->qty}}">
                                            <button class="btn btn-default plain" type="submit">
                                                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>${{$row->subtotal}}</td>
                                        <td>
                                            {!! Form::open(['action' => ['CartController@removeItem', $row->rowid], 'class' => 'remove-item-form inline', 'method' => 'DELETE']) !!}
                                            <input type="hidden" name="id" value="{{ $row->rowid }}">
                                            <button class="btn btn-default plain" type="submit">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>

                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><div class="align-right"><b>Total:</b></div></td>
                                        <td colspan="2">${{Cart::total()}}</td>
                                    </tr>
                            </tbody>
                        </table>

                        <hr/>

                        <div class="row">
                            <div class="col-md-2 col-md-offset-10">
                                {!! Form::open(['action' => ['CartController@destroy'], 'class' => 'destroy-cart-form inline']) !!}
                                <button class="btn btn-default" type="submit">
                                    {{Lang::get('products.shopping_cart_clear')}}
                                </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! HTML::script('js/jquery.form.min.js') !!}

    <script>
      /* jQuery(document).ready(function ($) {
            var ajxOptions = {
                success:       showResponse
            };

            jQuery('.remove-item-form').submit(function() {
                jQuery(this).ajaxSubmit(ajxOptions);
                return false;
            });
        });*/

        function showResponse(responseText, statusText, xhr, $form)  {
            if (parseInt(responseText) > 0) {
                $('#item_'+responseText+'_row').remove();
            }
        }
    </script>
@endsection