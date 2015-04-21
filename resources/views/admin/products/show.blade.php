@extends('admin.layout')

@section('breadcrumbs')
    {!! Breadcrumbs::render('products_show', $product) !!}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row spacing">
            <div class="col-md-8 col-md-offset-2">
                <h1>
                    {{ $product->name }}
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">
                    <form class="form-horizontal">
                        <div>
                            <h3>
                                {{ Lang::get('products.general_informations') }}
                            </h3>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="inventory_status" class="col-sm-2 control-label">{{ Lang::get('products.image_path') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{!! HTML::image('img/products/' . $product->image_path, 'Product', array( 'width' => 200, 'height' => 200 )) !!}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="inventory_status" class="col-sm-2 control-label">{{ Lang::get('products.inventory_status') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $product->inventoryStatus->name_fr }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="name" class="col-sm-2 control-label">{{ Lang::get('products.name') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $product->name }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.description') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $product->description }}</p>
                            </div>
                        </div>
                        @if ($product->length != "0.00")
                            <div class="form-group no-bottom-margin">
                                <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.length') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->length }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($product->width != "0.00")
                            <div class="form-group no-bottom-margin">
                                <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.width') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->width }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($product->height != "0.00")
                            <div class="form-group no-bottom-margin">
                                <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.height') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->height }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($product->weight != "0.00")
                            <div class="form-group no-bottom-margin">
                                <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.weight') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->weight }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($product->sku)
                            <div class="form-group no-bottom-margin">
                                <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.sku') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->sku }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($product->upc)
                            <div class="form-group no-bottom-margin">
                                <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.upc') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->upc }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="form-group no-bottom-margin">
                            <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.quantity') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $product->quantity }}</p>
                            </div>
                        </div>
                        @if ($product->date_available)
                            <div class="form-group no-bottom-margin">
                                <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.date_available') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $product->date_available }}</p>
                                </div>
                            </div>
                        @endif
                        <hr />
                        @if ($boardgame)
                            <div>
                                <h3>
                                    {{ Lang::get('products.board_game_informations') }}
                                </h3>
                            </div>
                            <div class="form-group no-bottom-margin">
                                <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.language') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $boardgame->language->code }}</p>
                                </div>
                            </div>
                            @if (!is_null($boardgame->minimum_players))
                                <div class="form-group no-bottom-margin">
                                    <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.minimum_players') }}</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $boardgame->minimum_players }}</p>
                                    </div>
                                </div>
                            @endif
                            @if (!is_null($boardgame->maximum_players))
                                <div class="form-group no-bottom-margin">
                                    <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.maximum_players') }}</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $boardgame->maximum_players}}</p>
                                    </div>
                                </div>
                            @endif
                            @if (!is_null($boardgame->minimum_age))
                                <div class="form-group no-bottom-margin">
                                    <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.minimum_age') }}</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $boardgame->minimum_age }}</p>
                                    </div>
                                </div>
                            @endif
                            @if (!is_null($boardgame->average_game_time))
                                <div class="form-group no-bottom-margin">
                                    <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.average_game_time') }}</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $boardgame->average_game_time }}</p>
                                    </div>
                                </div>
                            @endif
                            @if (!is_null($boardgame->website))
                                <div class="form-group no-bottom-margin">
                                    <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.website') }}</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $boardgame->website }}</p>
                                    </div>
                                </div>
                            @endif
                            @if (!is_null($boardgame->release_date))
                                <div class="form-group no-bottom-margin">
                                    <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.release_date') }}</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static">{{ $boardgame->release_date }}</p>
                                    </div>
                                </div>
                            @endif
                            <hr />
                        @endif

                        <div>
                            <h3>
                                {{ Lang::get('products.price_informations') }}
                            </h3>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.cost_price') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $price->cost_price }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.prime_cost') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $price->prime_cost }}</p>
                            </div>
                        </div>
                        <div class="form-group no-bottom-margin">
                            <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.retail_price') }}</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{ $price->retail_price }}</p>
                            </div>
                        </div>



                    <div class="row">
                        <div class="col-md-1 col-md-offset-2">
                            <a href="{{ action('Admin\ProductsController@edit', $product->id) }}">
                                <button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    {{ Lang::get('actions.edit') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($product->orders)
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="box">
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection