@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12 col-xs-12 col-sm-12 ">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Добавяне на автомобил</h2><span>Задаване на параметри</span></div>
                <fieldset>
                    <form action="" enctype="multipart/form-data"  method="post">
                        <div class="form-group col-md-3 col-sm-10 col-xs-10 col-xs-offset-0 {{$errors->has('brand')?'has-error':''}}">

                            <label for="brand" class="form-group">Марка</label>
                            <select name="brand" id="brand" class="form-control allBrands" value= "{{ old('brand') }}">
                                <option value="0" selected>-Марка-</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{ ($brand->id==old('brand')) ? 'selected="selected"' : '' }}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('brand'))
                                <span class="help-block">
                                        {{$errors->first('brand')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 col-sm-10 col-xs-10 col-md-offset-0 {{$errors->has('model')?'has-error':''}}">
                            <label for="model" class="form-group">Модел</label>
                            <select name="model" id="model" class="form-control allModels" >
                                <option value="0" selected>-Модел-</option>
                                @foreach($models as $model)
                                    <option value="{{$model->id}}" {{ ($model->id==old('model')) ? 'selected="selected"' : '' }}>{{$model->model}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('model'))
                                <span class="help-block">
                                        {{$errors->first('model')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 col-sm-10 col-xs-10 col-xs-offset-0 {{$errors->has('engine')?'has-error':''}}">
                            <label for="engine" class="form-group">Двигател</label>
                            <select name="engine" id="engine" class="form-control">
                                <option value="0" selected>-Двигател-</option>
                                @foreach($engines as $engine)
                                    <option value="{{$engine->id}}" {{ ($engine->id==old('engine')) ? 'selected="selected"' : '' }}>{{$engine->engine_type}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('engine'))
                                <span class="help-block">
                                        {{$errors->first('engine')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 col-sm-10 col-xs-10 col-xs-offset-0 {{$errors->has('color')?'has-error':''}}">
                            <label for="color" class="form-group">Цвят</label>
                            <select  name="color" id="color" class="form-control">
                                <option value="0" selected>-Цвят-</option>
                                @foreach($colors as $color)
                                    <option  value="{{$color->id}}" {{ ($color->id==old('color')) ? 'selected="selected"' : '' }}>{{$color->color_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('color'))
                                <span class="help-block">
                                        {{$errors->first('color')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 col-sm-10 col-xs-10 col-xs-offset-0 {{$errors->has('price')?'has-error':''}}">
                            <label for="model" class="form-group">Цена</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{old('price')}}">
                            @if($errors->has('price'))
                                <span class="help-block">
                                        {{$errors->first('price')}}
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 col-sm-10 col-xs-10 col-xs-offset-0{{$errors->has('photo')?'has-error':''}}">
                            <label for="model" class="form-group">Снимка</label>
                            <input type="file" name="photo" id="photo" class="form-control" value="{{old('photo')}}">
                            @if($errors->has('photo'))
                                <span class="help-block">
                                        {{$errors->first('photo')}}
                                </span>
                            @endif

                        </div>
                        {{csrf_field()}}
                        <div class="form-group col-md-3 col-xs-5 col-xs-offset-0">
                            <p>
                                <input type="text" value="0" name="id" id="id" hidden>
                                <button type="btn" name="addVehicle" id="addVehicle" class="btn btn-primary glyphicon-floppy-disk" class="form-control" style="width:150px;" value="Въведи"><span >  Съхрани</span></button>
                            </p>
                            <p>
                                <button class="btn btn-default" id="showAll" class="form-control glyphicon-list" style="width:150px;"><span class="glyphicon-list">Покажи всички</span></button>
                            </p>
                        </div>
                    </form>
                </fieldset>
            </div>
            <div class="message"></div>
            <p><a href="{{url('/').'/admin'}}">Обратно в настройки</a></p>
        </div>


        <div class="col-md-12" id="carList" hidden>
            <div class="class-xs-12">
                <h3>Списък автомобили</h3>
                @foreach($cars as $car)
                    <div class="col-md-12">

                            <img style="width:250px; height:200px" src="uploads/{{$car->photo}}" alt="image">

                        <div class="col-md-6" style="margin-left:30px;">
                            <p><span>Марка</span><span>&nbsp;{{$car->name}}</span></p>
                            <p><span>Модел</span><span>&nbsp;{{$car->model}}</span></p>
                            <p><span>Двигател</span><span>&nbsp;{{$car->engine_type}}</span></p>
                            <p><span>Цвят</span><span>&nbsp;<input type="color" value="{{$car->color}}"></span></p>
                            <p><span>Име на цвят</span><span>&nbsp;{{$car->color_name}}</span></p>
                            <p><span>Цена</span><span>&nbsp;{{$car->price}} &euro;</span></p>
                            <p>
                                <button type="btn" id="{{$car->id}}" class="btn btn-default form-group glyphicon glyphicon-pencil edit"  style="width:150px;" >Промяна</button>

                            </p>
                        </div>
                    </div>
                @endforeach

            </div>

            <button type="button" id="close">Затвори</button>
        </div>




    </div>



</div>

@endsection

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../../js/editSpecifications.js"></script>
<script type="text/javascript" src="../../js/search.js"></script>
