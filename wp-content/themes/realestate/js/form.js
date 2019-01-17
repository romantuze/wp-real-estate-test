$(document).ready(function(){

    $('#input-image').change(function(){    
        formdata = new FormData();
        if($(this).prop('files').length > 0) {
            file =$(this).prop('files')[0];
            formdata.append("photo", file);
        }
    });

    $('#property-form').submit(function(e){
        e.preventDefault();
        formdata = new FormData();
        formdata.append("send", true);
        formdata.append("input_title", $('#input-title').val());
        formdata.append("input_description", $('#input-description').val());
        formdata.append("input_type", $('#input-type').val());
        formdata.append("input_p", $('#input-p').val());
        formdata.append("input_s", $('#input-s').val());
        formdata.append("input_a", $('#input-a').val());
        formdata.append("input_g", $('#input-g').val());
        formdata.append("input_e", $('#input-e').val());
        formdata.append("input_city", $('#input-city').val());

        if ($('#input-image').prop('files').length > 0) {
            file = $('#input-image').prop('files')[0];
            formdata.append("input_image", file);
        }

        $.ajax({
            url: $(this).attr('action'),
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: formdata,
            type: 'post',
        }).done(function( data ) {
            alert( data );
       });       
    
    });
   
});