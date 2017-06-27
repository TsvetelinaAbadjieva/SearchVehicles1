@extends('layouts.app')
@section('content')
  <div class="page-header">
    <div class="col-md-10 col-offset-1 header">
        <div class="back row">
            <div class="title">
                <h1>Buy your new car on Auto Dealer </h1>
                <h3>Everything you need to build an amazing dealership website</h3>
            </div>
        </div>
    </div>
    <div class="panel panel-default">

        <div class="panel-body">
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation" style="background-color:#337ab7"><a href=""><i class="glyphicon glyphicon-search" style="color:white"></i><span class="badge">Търсене на автомобили</span></a></li>
                <li></li>
                <li></li>
                <li role="presentation"><a href="#"><span class="badge badge1" id="count"></span></a></li>
            </ul>
            <div class="col-md-4">
                <div class="col-sm-8">
                    <label for="brand" class="labelSearch">Марка</label>
                    <select name="brand" id="brand" class="form-control allBrands">
                        <option value="0">-Избери-</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}"style="color:darkslategrey">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-sm-8">
                    <label for="model" class="labelSearch">Модел</label>
                    <select name="model" id="model" class="form-control allModels">
                        <option value="0" style="color:darkslategrey">-Избери-</option>
                        @foreach($models as $model)
                            <option value="{{$model->id}}">{{$model->model}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-sm-8">
                    <p>
                        <label for="amount" class="labelSearch">Ценови диапазон:</label>
                        <input type="text" id="amount" readonly style="border:0;  color:cadetblue; font-weight:bold;" >
                    </p>

                    <div id="slider-range"></div>
                    <div id="slider-range-min"></div>
                    <div id="slider-range-max"></div>

                    <div class="form-control">



                    </div>

<!--
                    <select name="price" id="price"><label for="">Цена</label>
                        <option value="0" selected class="price" style="color:darkslategrey">Цена</option>
                        <option value="1" class="price" style="color:darkslategrey">0-5000$</option>
                        <option value="2" class="price" style="color:darkslategrey">5000$-10000$</option>
                        <option value="3" class="price" style="color:darkslategrey">100000$-15000$</option>
                        <option value="4" class="price" style="color:darkslategrey"> 15000$-20000$</option>
                        <option value="5" class="price" style="color:darkslategrey"> 20000$-25000$</option>
                        <option value="6" class="price" style="color:darkslategrey"> 25000$-30000$</option>
                        <option value="7" class="price" style="color:darkslategrey"> над 30000$</option>
                    </select>
-->
                </div>
            </div>

            <div class="col-md-4">
                <div class="col-sm-8">
                    <label for="engine" class="labelSearch">Двигател</label>
                    <select name="engine" id="engine" class="form-control">
                        <option value="0">-Избери-</option>
                        @foreach($engines as $engine)
                            <option value="{{$engine->id}}">{{$engine->engine_type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-sm-8">
                    <label for="color" class="labelSearch">Цвят</label>
                    <select name="color" id="color" class="form-control">
                        <option value="0">-Избери-</option>
                        @foreach($colors as $color)
                            <option value="{{$color->id}}">{{$color->color_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-sm-8">
                    <label for="" class="labelSearch"></label>
                    <button type="submit" id="submit" name="submit" class="form-control btn btn-default">Стартирай търсене</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12" id="searchList">


</div>

<div class="col-md-12" id="carList" hidden>
    <div class="class-xs-12">
        <h3>Списък автомобили</h3>
        @foreach($cars as $car)
            <div class="col-md-12">

                <img style="width:320px; height:200px" src="uploads/{{$car->photo}}" alt="image">

                <div class="col-md-6" style="margin-left:30px;">
                    <p><span>Марка</span><span class="data">&nbsp;{{$car->name}}</span></p>
                    <p><span>Модел</span><span>&nbsp;{{$car->model}}</span></p>
                    <p><span>Двигател</span><span>&nbsp;{{$car->engine_type}}</span></p>
                    <p><span>Цвят</span><span>&nbsp;<input type="color" value="{{$car->color}}"></span></p>
                    <p><span>Име на цвят</span><span>&nbsp;{{$car->color_name}}</span></p>
                    <p><span>Цена</span><span>&nbsp;{{$car->price}} $</span></p>
                    <p>
                        <button type="btn" id="{{$car->id}}" class="btn btn-default form-group glyphicon glyphicon-pencil"  style="width:150px;" onclick="editCar('{{$car->id}}');">Промяна</button>

                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <button type="button" id="close">Затвори</button>
</div>
  <script type="text/javascript" src="../../js/editSpecifications.js"></script>

@endsection