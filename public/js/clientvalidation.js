 $(this).on('blur keyup', function() {
    if ($("form").valid()) {
        $('[type="submit"]').prop('disabled', false);  
    } else {
        $('[type="submit"]').prop('disabled', 'disabled');
    }
});

$('input[type=file]').change(function(){
     if ($("form").valid()) {
        $('[type="submit"]').prop('disabled', false);  
    } else {
        $('[type="submit"]').prop('disabled', 'disabled');
    }
});