
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
    
        // alertify.alert('This is an Alertify alert!');
        
    
    }).fail((response) => {
    
        console.log(response);
        
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
    
        console.log(response);
        location.reload();
        
    
    }).fail((response) => {
    
        console.log(response);
        
    });

    


} );


} )(jQuery);