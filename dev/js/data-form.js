import alertify from 'alertifyjs';
( function($){

    $( '#data-form' ).submit(function(e){
        
        e.preventDefault();

        let form_data = $(this).serializeArray();

        $.ajax({
            type: 'POST',
            url: _form_settings.ajaxurl,
            cache: false,
            data: {
                action: 'skt_form_data',
                _wpnonce: _form_settings.nonce,
                settings: form_data
            }
        }).then((response) => {

            alertify.notify(response.data);
            
        
        }).fail((response) => {

            alertify.notify('Something went wrong');
            
        });
        
    });

    $( '#edit-form' ).submit(function(e){
        
        e.preventDefault();

        let form_data = $(this).serializeArray();

        $.ajax({
            type: 'POST',
            url: _form_settings.ajaxurl,
            cache: false,
            data: {
                action: 'skt_edit_data',
                _wpnonce: _form_settings.edit,
                settings: form_data
            }
        }).then((response) => {

            alertify.notify(response.data);            
        
        }).fail((response) => {

            alertify.notify('Something went wrong!');
            
        });
        
    });

    $('.skt-delete-data a').on( 'click', function(e) {

        e.preventDefault();

        let row = $(this).closest('tr');
        var itemId = row.data('id');

        $.ajax({
            type: 'POST',
            url: _form_settings.ajaxurl,
            cache: false,
            data: {
                action: 'skt_delete_data',
                _wpnonce: _form_settings.delete,
                id: itemId
            }
        }).then((response) => {
        
            location.reload();            
        
        }).fail((response) => {
            location.reload();         
        });

    } );


} )(jQuery);