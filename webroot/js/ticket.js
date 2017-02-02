activeClass = 'fa fa-check-circle-o';
inactiveClass = 'fa fa-circle-o';

$('#progress-tick').click(function() {
    if ($('#full-service').val() == 1) {
        $('#full-service').val(0);
        disableFullServiceForm();
        $("#progress-tick i:first-child").attr('class', inactiveClass);
        return;
    }

    $('#full-service').val(1);
    enableFullServiceForm();
    $("#progress-tick i:first-child").attr('class', activeClass);
})

$('#ticket-form').submit(function(e) {
    if (!Modernizr.formvalidation) {
        if (!$(this)[0].checkValidity()) {
            e.preventDefault();
            alert('Please fill out all of the required fields');
            return false;
        }
    }

    if (!Modernizr.textareamaxlength) {
        if ($("input[name=description]").val().trim().length > 500) {
            e.preventDefault();
            alert('Description must be less than 500 characters');
            return false;
        }

        if ($('#full-service').val() == 1 && $("input[name=additional]").val().trim().length > 500) {
            e.preventDefault();
            alert('Additional information must be less than 500 characters');
            return false;
        }
    }

    return true;
})

function enableFullServiceForm() {
    enableAndRequire($("input[name=department]"));
    enableAndRequire($("input[name=phone]"));
    enableAndRequire($("select[name=priority]"));
    enableAndRequire($("textarea[name=additional]"));
    $('#full-service-form').slideDown();
}

function disableFullServiceForm() {
    disableInput($("input[name=department]"));
    disableInput($("input[name=phone]"));
    disableInput($("select[name=priority]"));
    disableInput($("textarea[name=additional]"));
    $('#full-service-form').slideUp();  
}

function enableAndRequire(input) {
    $(input).prop("disabled", false);
    $(input).prop("required", true);
}

function disableInput(input) {
    $(input).prop("disabled", true);
    $(input).prop("required", false);
}
