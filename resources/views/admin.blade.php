@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <h2>Настройки на автомобили</h2> <span>Задаване на параметри</span></div>
                <fieldset>
                   <form action="{{route('brand')}}" method="post" id="form_brand">
                        <div class="form-group {{$errors->has('brand')?'has-error':''}}">
                            <label for="brand">Нова Марка</label>
                            <input type="text" name="brand" id="brand" class="form-control" value="{{old('brand')}}">
                            @if($errors->has('brand'))
                                <span class="help-block">
                                        {{$errors->first('brand')}}
                                    </span>
                            @endif

                            <div id="messageBrand"></div>
                            <select name="allBrands" id="allBrands" class="form-control" style="color:darkslategray; font-weight: 200; background-color:#f9fafb">
                                <option value="0" selected>Всички марки</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" style="color:darkslategray; font-weight: 300; background-color:#f9fafb" >{{$brand->name}}</option>
                                @endforeach
                            </select>

                            <button type="submit" name="addBrand" id="addBrand" class="btn btn-primary glyphicon glyphicon-floppy-disk" value="+"></button>

                         <!--   <button type="submit" name="editBrand" id="editBrand" class="btn btn-default glyphicon glyphicon-pencil"></button> -->
                        </div>
                        <div id="brandMessage" hidden></div>
                        {{csrf_field()}}
                   </form>
                </fieldset>
                <fieldset>
                    <form action="{{URL::route ('model')}}" method="post">
                        <div class="form-group {{$errors->has('brand1')?'has-error':''}}">
                            <label for="brand">Марка</label>
                            <select name="brand1" id="brand1" class="form-control allBrands">
                                <option value="0" selected>- Марка -</option>
                                @foreach($brands as $key=> $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('brand1'))
                                <span class="help-block">
                                        {{$errors->first('brand1')}}
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('model')?'has-error':''}}">
                            <label for="model">Нов Модел</label>
                            <input type="text" name="model" id="model" class="form-control" value="{{old('model')}}">
                            @if($errors->has('model'))
                                <span class="help-block">
                                        {{$errors->first('model')}}
                                </span>
                            @endif

                            <select name="allModels" id="allModels" class="form-control allModels">
                                <option value="0" selected >Всички модели</option>
                                @foreach($models as $model)
                                    <option value="{{$model->id}}">{{$model->model}}</option>
                                @endforeach

                            </select>

                            <button type="submit" name="addModel" id="addModel" class="btn btn-primary glyphicon glyphicon-floppy-disk" value="+"></button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </fieldset>
                <fieldset>
                    <form action="{{URL::route ('engine')}}" method="post">
                        <div class="form-group {{$errors->has('engine')?'has-error':''}}">
                            <label for="brand">Нов Двигател</label>
                            <input type="text" name="engine" id="engine" class="form-control" value="{{old('engine')}}">
                            @if($errors->has('engine'))
                                <span class="help-block">
                                        {{$errors->first('engine')}}
                                </span>
                            @endif

                            <select name="allEngines" id="allEngines" class="form-control">
                                <option value="0" selected>Всички двигатели</option>
                                @foreach($engines as $engine)
                                    <option value="{{$engine->id}}">{{$engine->engine_type}}</option>
                                @endforeach
                            </select>

                            <input type="submit" name="addEngine" id="addEngine" class="btn btn-primary" value="+">
                        </div>
                        {{csrf_field()}}
                    </form>
                </fieldset>
                <fieldset>
                    <form action="{{URL::route ('color')}}" method="post">
                        <div class="form-group {{$errors->has('color_name')?'has-error':''}}">
                            <label for="brand">Нов Цвят</label>
                            <input type="color" name="color" id="color" class="form-control" value="{{old('color')}}">
                            <label for="brand">Наименование на цвят</label>

                            <input type="text" name="color_name" id="color_name" class="form-control" value="{{old('color_name')}}">
                            @if($errors->has('color_name'))
                                <span class="help-block">
                                        {{$errors->first('color_name')}}
                                </span>
                            @endif

                            <select name="allColorNames" id="allColorNames" class="form-control">
                                <option value="0" selected>Всички цветове</option>
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->color_name}}</option>
                                @endforeach
                            </select>

                            <button type="submit" name="addColor" id="addColor" class="btn btn-primary glyphicon glyphicon-floppy-disk" value=""></button>
                        </div>
                        {{csrf_field()}}
                        <a href="{{route('car')}}">Добавяне на автомобил</a>

                    </form>
                </fieldset>


            </div>

        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
