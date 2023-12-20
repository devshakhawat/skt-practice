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
    
        console.log(response);
        
    
    }).fail((response) => {
    
        console.log(response);
        
    });
    
});

$('.skt-delete-data').on( 'click', function(e) {
    e.preventDefault();

    


} );


} )(jQuery);