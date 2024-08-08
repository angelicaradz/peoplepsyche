// FOR SUPERADMIN'S ADD USER TOGGLE BUTTON

// SHOW MODAL
$(document).ready(function() {
    $('#add_client_button').on('click', function(event) {
        event.preventDefault();
        $('#add_client_modal').modal('show');
    });

    $('#add_admin_button').on('click', function(event) {
        event.preventDefault();
        $('#add_admin_modal').modal('show');
    });

    $('#add_superadmin_button').on('click', function(event) {
        event.preventDefault();
        $('#add_superadmin_modal').modal('show');
    });
});

//ADD CLIENT
$(document).ready(function() {
    $('#client-btn').on('click', function() {

        let isValid = true;
        let requiredFields = $('#client-form').find('input[required], select[required]');

        requiredFields.each(function() {
            if ($(this).val() === '') {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (isValid) {
            $('#client-form').submit();
        } else {
            console.log('Please fill all the required fields.');
        }
    });

    $('#client-form').on('input change', 'input[required], select[required]', function() {
        if ($(this).val() === '') {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });
});

//ADD ADMIN
$(document).ready(function() {
    $('#admin-btn').on('click', function() {

        let isValid = true;
        let requiredFields = $('#admin-form').find('input[required], select[required]');

        requiredFields.each(function() {
            if ($(this).val() === '') {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (isValid) {
            $('#admin-form').submit();
        } else {
            console.log('Please fill all the required fields.');
        }
    });

    $('#admin-form').on('input change', 'input[required], select[required]', function() {
        if ($(this).val() === '') {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });
});

//ADD SUPERADMIN
$(document).ready(function() {
    $('#superadmin-btn').on('click', function() {

        let isValid = true;
        let requiredFields = $('#superadmin-form').find('input[required], select[required]');

        requiredFields.each(function() {
            if ($(this).val() === '') {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (isValid) {
            $('#superadmin-form').submit();
        } else {
            console.log('Please fill all the required fields.');
        }
    });

    $('#superadmin-form').on('input change', 'input[required], select[required]', function() {
        if ($(this).val() === '') {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });
});
