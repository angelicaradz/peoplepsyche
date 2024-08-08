// FOR ADMIN'S ADD CLIENT TOGGLE BUTTON

// SHOW MODAL
$(document).ready(function() {
    $('#add_new_button').on('click', function(event) {
        event.preventDefault();
        $('#add_user_modal').modal('show');
    });

    $('#generate_code_button').on('click', function(event) {
        event.preventDefault();
        $('#generate_code_modal').modal('show');
    });
});

//ADD CLIENT
$(document).ready(function() {
    $('#submit-btn').on('click', function() {

        let isValid = true;
        let requiredFields = $('#register-form').find('input[required], select[required]');

        requiredFields.each(function() {
            if ($(this).val() === '') {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (isValid) {
            $('#register-form').submit();
        } else {
            console.log('Please fill all the required fields.');
        }
    });

    $('#register-form').on('input change', 'input[required], select[required]', function() {
        if ($(this).val() === '') {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });
});

//GENERATE ACCESS CODE FOR CLIENT REGISTRATION
$(document).ready(function() {
    $('#generate_code_form').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting via the browser

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.code) {
                    $('#generated_code').html('<p>' + response.code + '</p>');
                } else {
                    $('#generated_code').html('<p>Error generating code. Please try again.</p>');
                }
            },
            error: function() {
                $('#generated_code').html('<p>Error generating code. Please try again.</p>');
            }
        });
    });
});
