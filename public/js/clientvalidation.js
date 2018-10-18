$('input').on('blur click', function() {
     
    if ($("form").valid()) {
        $('[type="submit"]').prop('disabled', false);  
    } else {
        $('[type="submit"]').prop('disabled', 'disabled');
    }
});