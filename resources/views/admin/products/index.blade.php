@extends('admin.layout')

@section('breadcrumbs')
    {!! Breadcrumbs::render('products') !!}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
                <h1>
                    {{ Lang::get('products.product') }}
                </h1>
            </div>
            <div class="col-md-11">
            </div>
        </div>
        <div class="row">
            <div class="col-md-11"></div>
            <div class="col-md-1">
                <a href="{{ action('Admin\ProductsController@create') }}">
                    <button type="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        {{ Lang::get('actions.add') }}
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('products.name') }}</th>
                        <th>{{ Lang::get('products.description') }}</th>
                        <th>{{ Lang::get('products.length') }}</th>
                        <th>{{ Lang::get('products.width') }}</th>
                        <th>{{ Lang::get('products.height') }}</th>
                        <th>{{ Lang::get('products.weight') }}</th>
                        <th>{{ Lang::get('products.sku') }}</th>
                        <th>{{ Lang::get('products.upc') }}</th>
                        <th>{{ Lang::get('actions.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr id="product_{{ $product->id }}_row">
                            <td>
                                {{ $product->id }}
                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                {{ $product->description }}
                            </td>
                            <td>
                                {{ $product->length != "0.00" ? $product->length : "N.D." }}
                            </td>
                            <td>
                                {{ $product->width != "0.00" ? $product->width : "N.D." }}
                            </td>
                            <td>
                                {{ $product->height != "0.00" ? $product->height : "N.D." }}
                            </td>
                            <td>
                                {{ $product->weight != "0.00" ? $product->weight : "N.D." }}
                            </td>
                            <td>
                                {{ $product->sku ? $product->sku : "N.D." }}
                            </td>
                            <td>
                                {{ $product->upc ? $product->upc : "N.D." }}
                            </td>
                            <td>
                                <a class="actions" href="{{ action('Admin\ProductsController@show', $product->id) }}">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </a>
                                <a class="actions" href="{{ action('Admin\ProductsController@edit', $product->id) }}">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>

                                {!! Form::open(['action' => ['Admin\ProductsController@destroy', $product->id], 'id' => 'product'.$product->id, 'class' => 'delete-form inline', 'method' => 'DELETE']) !!}
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button class="btn btn-default plain" type="submit">
                                    <a class="actions" href="{{ action('Admin\ProductsController@destroy', $product->id) }}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>
                                </button>

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! HTML::script('js/jquery.form.min.js') !!}
    <script>
        $(document).ready(function() {
            var options = {
                success:       showResponse
            };

            $('.delete-form').submit(function() {
                $(this).ajaxSubmit(options);
                return false;
            });
        });

        function showResponse(responseText, statusText, xhr, $form)  {
            if (parseInt(responseText) > 0) {
                $('#product_'+responseText+'_row').remove();
            }
        }
    </script>
@endsection
