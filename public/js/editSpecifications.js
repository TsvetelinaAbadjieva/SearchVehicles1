$(document).ready(function(){

    var baseUrl=window.location.origin;
    var id = $('#id').val(0);

    $('#allModels').filter('[value!="0"]').removeAttr('hidden').attr('selected',true);



    $('#allBrands').on('change',function(){
        $('#brand').val('');
        var brandText = $('#allBrands option:selected').text();
        if($('#allBrands option:selected').text() != 'Всички марки')

            $('#brand').val(brandText).show() ;


    });

    $('#allModels').on('change',function(){
        $('#model').val('');
        var modelText = $('#allModels option:selected').text();
        if($('#allModels option:selected').text() != 'Всички модели')
            $('#model').val(modelText).show() ;

    });

    $('#allEngines').on('change',function(){
        var engineText = $('#allEngines option:selected').text();
        $('#engine').val('');
        if($('#allEngines option:selected').text() != 'Всички двигатели')
            $('#engine').val(engineText).show() ;

    });
    $('#allColorNames').on('change',function(){
        var colorText = $('#allColorNames option:selected').text();
        $('#color_name').val('');
        if($('#allColorNames option:selected').text() != 'Всички цветове')
            $('#color_name').val(colorText).show() ;

    });

    $('.allBrands').on('change', function (e) {
        e.preventDefault();
        $('.allModels').html('');
        $('.allModels').append('<option value="0" selected>Всички модели</option>');

        var id= $('.allBrands option:selected').val();
        $.ajax({
            'url':'/models',
            'type': 'GET',
            'data': {'id':id},
            'dataType': 'json'
        }).done(function(response){
            var i=0;
            $('.allModels').attr('hidden',true);

           // $('#allModels option[value="0"]').removeAttr('hidden');
            //$('#allModels option[value=0]').attr('selected','selected');

            $.each(response,function(index,value){

                $('.allModels').append('<option value="'+response[i].id+'">'+response[i].model+'</option>');
               // $('#allModels').val(response[i].model);
                i++;
            });
        }).fail(function(response){

        });
    });
/*
    $('#addBrand').on('click', function(e){
        e.preventDefault();
        var id = $('#allBrands option:selected').val();
        var brand = $('#brand').val();
        alert('id= '+id+' brand= '+brand);

        $.ajax({
            url:    baseUrl+'/brand',
            type:   'GET',
            data:{ 'id': id,
                    'brand'  : brand

                },
            dataType:'json'

        }).done(function(response){

            if(response=='Success')
            $('#brandMessage').html("Марката е променена").show();

        }).fail(function(response){
            alert('Something went wrong in this request!');

            console.log(response);
        });



    });
*/
$('#showAll').on('click',function(e){
    e.preventDefault();
    $('#carList').show();

});

    $('#close').on('click',function(e){
        e.preventDefault();
        $('#carList').hide();
    });

$('.edit').on('click',function(){
    id = $(this).attr('id');
    console.log(id);
    $.ajax({
        url:'/editcar',
        type:'GET',
        data:{'id': id},
        dataType:'json'
    }).done(function(response){
        $('#id').val(id);
        console.log(response.brand_id);
        $('#brand').val(response.brand_id);
        $('#model').val(response.model_id).change();
        $('#engine').val(response.engine_id).change();
        $('#color').val(response.color_id).change();
        $('#price').val(Math.ceil(response.price));
        $('#photo').val(response.photo);


    }).fail(function(jqXHR,textStatus){
        alert('Request failed  :'+textStatus);
    });
});

$('#addVehicle').on('click', function(){
     id= $('#id').val();
     console.log(id);
    var brand = $('#brand option:selected').val();
    var model = $('#model option:selected').val();
    var engine = $('#engine option:selected').val();
    var color = $('#color option:selected').val();
    var price = $('#price').val();
   // var photo = $('#photo').val();

    $.ajax({
        url:'/postCar',
        type: 'POST',
        data: {
            'id':id,
            'brand': brand_id,
            'model': model_id,
            'engine':engine_id,
            'color': color_id,
            'price': price,
            'photo': photo
        }
    }).done(function(response){
        $('.message').html('<p>Промяната е успешна!</p>').show();
    }).fail(function (jqXHR,textStatus) {
        alert('Request failed: '+textStatus);
    })

});


});