jQuery(document).ready(function($) {
    // true = valid, false = invalid
    var supportRequiredFields = [
        'First Name',
        'Last Name',
        'Email',
        'Support School or District',
        'How can we help',
        'Support User Type',
        'Support Product'
    ];
    var supportValidationStates = {
        'First Name': false,
        'Last Name': false,
        'Email': false,
        'Support School or District': false,
        'How can we help': false,
        'Support User Type': false,
        'Support Product': false
    };

    $('#form_0018')
        // field element is invalid
        .on("invalid.zf.abide", function(ev,elem) {
            supportValidationStates[elem.attr('name')] = false;
        })
        // field element is valid
        .on("valid.zf.abide", function(ev,elem) {
            supportValidationStates[elem.attr('name')] = true;
        });

    doSupportSubmit = function(form) {
        var requiredCount = 7;
        var validFields = 0;
        for (var i = 0; i < supportRequiredFields.length; i++) {
            Object.keys(supportValidationStates).forEach(function(key, value) {
                if (supportRequiredFields[i] === key && supportValidationStates[key] === true) {
                    validFields++;
                }
            });
        }

        if (validFields === requiredCount) {
            var ao_jstzo = formElementById(form, "ao_jstzo");
            if (ao_jstzo) ao_jstzo.value = new Date().getTimezoneOffset();
            formElementById(form, 'ao_bot').value = 'nope';
            form.submit();
            // $('input').each(function() {
            //     $(this).val('');
            //     $(this).removeClass('is-invalid-input');
            //     $(this).closest('label').removeClass('is-invalid-input').find('form-error').removeClass('is-visible');
            // });
            // $('textarea').each(function() {
            //     $(this).val('');
            //     $(this).removeClass('is-invalid-input');
            //     $(this).closest('label').removeClass('is-invalid-input').find('form-error').removeClass('is-visible');
            // });
            $('#contact .big-form').hide();
            $('#contact h2').text('Thank you!');
            $('#contact p').text('We will be in touch with you shortly.');

            var head_height = $('#header').height();
            var target = $('#contact');
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - head_height
                }, 1000);
                return false;
            }
        }
    };
});
