$('#mailForm').submit(function(e) {
    e.preventDefault();
    
    var first = $('#first').val();
    var last = $('#last').val();
    var email = $('#email').val();
    var message = $('#message').val();
    
    var formData = {
        'action':'mail',
        'first':first,
        'last':last,
        'email': email,
        'message':message
    };
    
    $.ajax({
        method: 'post',
        url: 'mail.php',
        data: formData,
        success: function(data) {
            console.log(data);
            SuccessAnimation();
        },
        error: function(request, status, err) {
            console.log(request.responseText);
            //handleFormError(JSON.parse(request.responseText));
        }

        
    });
    
    function handleFormError(err) {
        for (var prop in err) {
            $('#err-'+prop).html(err[prop]);
        }
    }
});


function SuccessAnimation() {
    $('#successMessage').css('visibility', 'visible');
    window.setTimeout(function() {
        $('#successMessage').fadeOut();
    });
}
