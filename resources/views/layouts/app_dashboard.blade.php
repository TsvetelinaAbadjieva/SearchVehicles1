<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title>Laravel</title>





    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

    <!-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <style>


        <!---->
        html, body {
            background-color: #fff;
            color: #fff;
            font-family: 'Raleway', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;

        }

        .full-height {
            height: auto;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            font-weight: bold;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .header {
            background: url(http://1.bp.blogspot.com/_YqkzEeuHdvM/TMV-vD7BP8I/AAAAAAAAARk/MUmE-O-tl94/s1600/lincoln-latest-car-wallpaper.jpg);
            box-sizing: border-box;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 300px;
            position:absolute;


        }
        .title{
            width:70%;
            margin:0 auto;
            background-color: darkslategrey;
            opacity:0.6
        }
        .nav{
            position:relative;
            margin-top: 240px;
            z-index: 1;
        }
        .badge{
            color:whitesmoke;
            background-color: #337ab7;
            font-family: SansSerif;
            font-size: 18px;
        }
        .badge1,li:last-child{
            color:whitesmoke;
            background-color: seagreen;
        }
        li:last-child{
            float:right;
            position:relative;
            float:right;
        }
        .labelSearch{
            color:gray;
        }
        .price :nth-child(n){
            color:darkslategrey;
        }
        .back{
            width:100%;
            height:300px; ;
            background-color:darkslategray;
            opacity:0.6;
            box-sizing: border-box;
        }
    </style>
</head>
<body>


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
                    <select name="brand" id="brand" class="form-control">
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
                    <select name="model" id="model" class="form-control">
                        <option value="0" style="color:darkslategrey">-Избери-</option>
                        @foreach($models as $model)
                            <option value="{{$model->id}}">{{$model->model}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-sm-8">
                    <label for="model" class="labelSearch label-control">Ценови диапазон</label>
                    <div class="progress form-control">


                        <div class="progress-bar progress-bar-default" style="width: 25%">
                            <span class="sr-only">25% Complete (success)</span>
                        </div>
                        <div class="progress-bar progress-bar-info" style="width: 30%">
                            <span class="sr-only">30% Complete (warning)</span>
                        </div>
                        <div class="progress-bar progress-bar-default" style="width: 10%">
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>

                    </div>

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

                <img style="width:250px; height:200px" src="uploads/{{$car->photo}}" alt="image">

                <div class="col-md-6" style="margin-left:30px;">
                    <p><span>Марка</span><span>&nbsp;{{$car->name}}</span></p>
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

<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="../../js/search.js"></script>

</body>
</html>
