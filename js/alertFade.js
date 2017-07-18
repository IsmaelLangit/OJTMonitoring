window.setTimeout(function() {
    $(".alert").fadeTo(450, 0).slideUp(600, function(){
        $(this).remove(); 
    });
}, 4500);