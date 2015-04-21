@extends('admin.layout')

@section('breadcrumbs')
    {!! Breadcrumbs::render('products_edit', $product) !!}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row spacing">
            <div class="col-md-8 col-md-offset-2">
                <h1>
                    {{ Lang::get('products.edit_product') . ' ' . $product->name }}
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="box">
                    {!! Form::open(['action' => ['Admin\ProductsController@update', $product->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div>
                        <h3>
                            {{ Lang::get('products.general_informations') }}
                        </h3>
                    </div>
                    <div class="form-group {{ $errors->first('inventory_status_id') ? 'has-error' : '' }}">
                        <label for="inventory_status" class="col-sm-2 control-label">{{ Lang::get('products.inventory_status') }}</label>
                        <div class="col-sm-10">

                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-sm-2 control-label">{{ Lang::get('products.name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" maxlength="100" placeholder="{{ Lang::get('products.name') }}" value="{{ old('name') ? old('name') : $product->name }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
                        <label for="description" class="col-sm-2 control-label">{{ Lang::get('products.description') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description" placeholder="{{ Lang::get('products.description') }}" value="{{ old('description') ? old('description') : $product->description }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('length') ? 'has-error' : '' }}">
                        <label for="length" class="col-sm-2 control-label">{{ Lang::get('products.length') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="length" name="length" maxlength="25" placeholder="{{ Lang::get('products.length') }}" value="{{ old('length') ? old('length') : $product->length }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('width') ? 'has-error' : '' }}">
                        <label for="width" class="col-sm-2 control-label">{{ Lang::get('products.width') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="width" name="width" maxlength="150" placeholder="{{ Lang::get('products.width') }}" value="{{ old('width') ? old('width') : $product->width }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('height') ? 'has-error' : '' }}">
                        <label for="height" class="col-sm-2 control-label">{{ Lang::get('products.height') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="height" name="height" maxlength="150" placeholder="{{ Lang::get('products.height') }}" value="{{ old('height') ? old('height') : $product->height }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('weight') ? 'has-error' : '' }}">
                        <label for="weight" class="col-sm-2 control-label">{{ Lang::get('products.weight') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="weight" name="weight" maxlength="150" placeholder="{{ Lang::get('products.weight') }}" value="{{ old('weight') ? old('weight') : $product->weight }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('sku') ? 'has-error' : '' }}">
                        <label for="sku" class="col-sm-2 control-label">{{ Lang::get('products.sku') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sku" name="sku" maxlength="150" placeholder="{{ Lang::get('products.sku') }}" value="{{ old('sku') ? old('sku') : $product->sku }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('upc') ? 'has-error' : '' }}">
                        <label for="upc" class="col-sm-2 control-label">{{ Lang::get('products.upc') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="upc" name="upc" maxlength="150" placeholder="{{ Lang::get('products.upc') }}" value="{{ old('upc') ? old('upc') : $product->upc }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('quantity') ? 'has-error' : '' }}">
                        <label for="quantity" class="col-sm-2 control-label">{{ Lang::get('products.quantity') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="quantity" name="quantity" maxlength="150" placeholder="{{ Lang::get('products.quantity') }}" value="{{ old('quantity') ? old('quantity') : $product->quantity }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('date_available') ? 'has-error' : '' }}">
                        <label for="image_path" class="col-sm-2 control-label">{{ Lang::get('products.date_available') }}</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date_available" name="date_available" maxlength="150" placeholder="{{ Lang::get('products.date_available') }}" value="{{ old('date_available') ? old('date_available') : $product->date_available }}">
                        </div>
                    </div>
                    <hr/>
                    @if ($boardgame)
                        <div>
                            <h3>
                                {{ Lang::get('products.board_game_informations') }}
                            </h3>
                        </div>
                        <div class="form-group {{ $errors->first('language_id') ? 'has-error' : '' }}">
                            <label for="language_id" class="col-sm-2 control-label">{{ Lang::get('products.language') }}</label>
                            <div class="col-sm-10">
                                {!! Form::select('language_id', $languages, 1, array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('minimum_players') ? 'has-error' : '' }}">
                            <label for="minimum_players" class="col-sm-2 control-label">{{ Lang::get('products.minimum_players') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="minimum_players" name="minimum_players" maxlength="100" placeholder="{{ Lang::get('products.minimum_players') }}" value="{{ old('minimum_players') ? old('minimum_players') : $boardgame->minimum_players }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('maximum_players') ? 'has-error' : '' }}">
                            <label for="maximum_players" class="col-sm-2 control-label">{{ Lang::get('products.maximum_players') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="maximum_players" name="maximum_players" maxlength="100" placeholder="{{ Lang::get('products.maximum_players') }}" value="{{ old('maximum_players') ? old('maximum_players') : $boardgame->maximum_players }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('minimum_age') ? 'has-error' : '' }}">
                            <label for="minimum_age" class="col-sm-2 control-label">{{ Lang::get('products.minimum_age') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="minimum_age" name="minimum_age" maxlength="100" placeholder="{{ Lang::get('products.minimum_age') }}" value="{{ old('minimum_age') ? old('minimum_age') : $boardgame->minimum_age }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('average_game_time') ? 'has-error' : '' }}">
                            <label for="average_game_time" class="col-sm-2 control-label">{{ Lang::get('products.average_game_time') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="average_game_time" name="average_game_time" maxlength="100" placeholder="{{ Lang::get('products.average_game_time') }}" value="{{ old('average_game_time') ? old('average_game_time') : $boardgame->average_game_time }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('website') ? 'has-error' : '' }}">
                            <label for="website" class="col-sm-2 control-label">{{ Lang::get('products.website') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="website" name="website" maxlength="100" placeholder="{{ Lang::get('products.website') }}" value="{{ old('website') ? old('website') : $boardgame->website }}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('release_date') ? 'has-error' : '' }}">
                            <label for="release_date" class="col-sm-2 control-label">{{ Lang::get('products.release_date') }}</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="release_date" name="release_date" maxlength="100" placeholder="{{ Lang::get('products.release_date') }}" value="{{ old('release_date') ? old('release_date') : $boardgame->release_date }}">
                            </div>
                        </div>
                        <hr />
                    @endif
                    <div>
                        <h3>
                            {{ Lang::get('products.price_informations') }}
                        </h3>
                    </div>
                    <div class="form-group {{ $errors->first('cost_price') ? 'has-error' : '' }}">
                        <label for="cost_price" class="col-sm-2 control-label">{{ Lang::get('products.cost_price') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cost_price" name="cost_price" maxlength="100" placeholder="{{ Lang::get('products.cost_price') }}" value="{{ old('cost_price') ? old('cost_price') : $price->cost_price }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('prime_cost') ? 'has-error' : '' }}">
                        <label for="prime_cost" class="col-sm-2 control-label">{{ Lang::get('products.prime_cost') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prime_cost" name="prime_cost" maxlength="100" placeholder="{{ Lang::get('products.prime_cost') }}" value="{{ old('prime_cost') ? old('prime_cost') : $price->prime_cost  }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->first('retail_price') ? 'has-error' : '' }}">
                        <label for="retail_price" class="col-sm-2 control-label">{{ Lang::get('products.retail_price') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="retail_price" name="retail_price" maxlength="100" placeholder="{{ Lang::get('products.retail_price') }}" value="{{ old('retail_price') ? old('retail_price') : $price->retail_price  }}">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                {{ Lang::get('actions.save') }}
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection