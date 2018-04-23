jQuery(document).ready(function($) {
    // true = valid, false = invalid
    var mediaRequiredFields = [
        'First Name',
        'Last Name',
        'Email',
        'Title',
        'Department',
        'Organization',
        'How can we help'
    ];
    var mediaValidationStates = {
        'First Name': false,
        'Last Name': false,
        'Email': false,
        'Title': false,
        'Department': false,
        'Organization': false,
        'How can we help': false
    };

    $('#form_0010')
        // field element is invalid
        .on("invalid.zf.abide", function(ev,elem) {
            mediaValidationStates[elem.attr('name')] = false;
        })
        // field element is valid
        .on("valid.zf.abide", function(ev,elem) {
            mediaValidationStates[elem.attr('name')] = true;
        });

    doMediaSubmit = function(form) {
        var requiredCount = 7;
        var validFields = 0;
        for (var i = 0; i < mediaRequiredFields.length; i++) {
            Object.keys(mediaValidationStates).forEach(function(key, value) {
                if (mediaRequiredFields[i] === key && mediaValidationStates[key] === true) {
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
