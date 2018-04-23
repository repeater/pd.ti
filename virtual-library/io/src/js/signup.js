jQuery(document).ready(function($) {
    // true = valid, false = invalid
    var signupRequiredFields = [
        'Email address'
    ];
    var signupValidationStates = {
        'Email address': false
    };

    $('#form_000e')
        // field element is invalid
        .on("invalid.zf.abide", function(ev,elem) {
            signupValidationStates[elem.attr('name')] = false;
        })
        // field element is valid
        .on("valid.zf.abide", function(ev,elem) {
            signupValidationStates[elem.attr('name')] = true;
        });

    doSignUpSubmit = function(form) {
        var requiredCount = 1;
        var validFields = 0;
        for (var i = 0; i < signupRequiredFields.length; i++) {
            Object.keys(signupValidationStates).forEach(function(key, value) {
                if (signupRequiredFields[i] === key && signupValidationStates[key] === true) {
                    validFields++;
                }
            });
        }

        if (validFields === requiredCount) {
            var ao_jstzo = formElementById(form, "ao_jstzo");
            if (ao_jstzo) ao_jstzo.value = new Date().getTimezoneOffset();
            formElementById(form, 'ao_bot').value = 'nope';
            form.submit();
        }
    };
});
