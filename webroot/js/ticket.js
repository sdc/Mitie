activeClass = 'fa fa-check-circle-o';
inactiveClass = 'fa fa-circle-o';

$(document).ready(function() {
    if (!Modernizr.placeholder) {
        $("label").show();
        return notify(
            'For emergencies i.e. leaks/floods, power loss, safety or security issues - call x877',
            'info'
        );
    }
})

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
        $(this).find('select, input, textarea').each(function() {
            if ($(this).attr('required') != null && !$(this).val()) {
                e.preventDefault();
                notify('Please fill out all of the required fields', 'error');
                return false;   
            }
        })
    }
    
    if (!Modernizr.textareamaxlength) {
        if ($("input[name=description]").val().trim().length > 100) {
            e.preventDefault();
            notify('Description must be less than 100 characters', 'error');
            return false;
        }

        if ($('#full-service').val() == 1 && $("input[name=additional]").val().trim().length > 100) {
            e.preventDefault();
            notify('Additional information must be less than 100 characters', 'error');
            return false;
        }
    }

    return true;
})

function enableFullServiceForm() {
    enableAndRequire($("input[name=department]"));
    enableAndRequire($("input[name=phone]"));
    enableAndRequire($("select[name=priority]"));
    $("textarea[name=additional]").prop("disabled", false);
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
