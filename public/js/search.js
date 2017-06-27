$(document).ready(function(){
var minPrice=1000;
var maxPrice=150000;
    $( function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 2000,
            max: 100000,
            step:1000,
            values: [ 5000, 25000 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                minPrice=ui.values[0];
                maxPrice=ui.values[1];
                $("#slider-range .ui-slider-range").css({"background":"#4682b4"});

                $("#slider-range .ui-slider-handle").css({"border-color":"#4682b4"});


            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );
        $( "#amount" ).val( "$" + $( "#slider-range-min" ).slider( "value" ) );
        $( "#amount" ).val( "$" + $( "#slider-range-max" ).slider( "value" ) );

    } );
    $('#slider-range').on('click', function(){
        $('#slider').append(minPrice+ ' '+maxPrice);
    });

    var brand = $('#brand option:selected').val();
    var model = $('#model option:selected').val();
    var engine = $('#engine option:selected').val();
    var color = $('#color option:selected').val();


   // var price = $('#price').val();
    $.ajax({
        url: 'searchCars',
        type: 'GET',
        data: { 'brand': brand,
                'model':model,
                'engine': engine,
                'color' : color,
                'minPrice' : minPrice,
                'maxPrice' : maxPrice

        }
    }).done(function(response) {

        $('#count').text(response.length);
    }).fail(function(){
        alert('Something went wrong');
    });

    $('#brand').on('change',function(){

    });

    $('#submit').on('click',function(e){
        e.preventDefault();

        brand = $('#brand option:selected').val();
        model = $('#model option:selected').val();
        engine = $('#engine option:selected').val();
        color = $('#color option:selected').val();
       // var price = $('#price').val();
        $('#searchList').html('');

        $.ajax({
            url: 'searchCars',
            type: 'GET',
            data: {'brand': brand,
                    'model':model,
                    'engine': engine,
                    'color' : color,
                    'minPrice' : minPrice,
                    'maxPrice' : maxPrice
            }
        }).done(function(response){
            console.log(response[0].name);
            $('#count').text(response.length);
            var i=0;
            if(response.length==0)
                $('#searchList').append('<div class="col-md-12"><h4>Няма данни, за тази селекция</h4></div>');
            else
                $.each(response,function(index,item){

                $('#searchList').append(
                '<div class="col-md-12 styles">'+

                    '<img style="width:320px; height:200px" src="uploads/'+response[i].photo+'" alt="image">'+

                    '<div class="col-md-6" style="margin-left:30px;">'+
                    '<p><span>Марка</span><span>&nbsp;'+response[i].name+'</span></p>'+
                    '<p><span>Модел</span><span>&nbsp;'+response[i].model+'</span></p>'+
                    '<p><span>Двигател</span><span>&nbsp;'+response[i].engine_type+'</span></p>'+
                '<p><span>Цвят</span><span>&nbsp;<input type="color" value="'+response[i].color+'"></span></p>'+
                    '<p><span>Име на цвят</span><span>&nbsp;'+response[i].color_name+'</span></p>'+
                    '<p><span>Цена</span><span>&nbsp;'+Math.ceil(response[i].price)+' &dollar;</span></p>'+
                '<p>'+
                '</p>'+

                    '</div>'+
                    '</div>'+

                '</div>');
                i++;
            });

        }).fail(function(jqXhr,textStatus){

            alert('Ajax error'+textStatus);
        });


    });
});