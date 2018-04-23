jQuery(document).ready(function($) {
    // true = valid, false = invalid
    var pricingRequiredFields = [
        'First Name',
        'Last Name',
        'Email',
        'Title',
        'Department',
        'Organization',
        'Students'
    ];
    var pricingValidationStates = {
        'First Name': false,
        'Last Name': false,
        'Email': false,
        'Title': false,
        'Department': false,
        'Organization': false,
        'Students': false
    };

    $('#form_0011')
        // field element is invalid
        .on("invalid.zf.abide", function(ev,elem) {
            pricingValidationStates[elem.attr('name')] = false;
            console.log('invalid');
        })
        // field element is valid
        .on("valid.zf.abide", function(ev,elem) {
            pricingValidationStates[elem.attr('name')] = true;
            console.log('valid');
        });

    doPricingSubmit = function(form) {
        var requiredCount = 7;
        var validFields = 0;
        for (var i = 0; i < pricingRequiredFields.length; i++) {
            Object.keys(pricingValidationStates).forEach(function(key, value) {
                if (pricingRequiredFields[i] === key && pricingValidationStates[key] === true) {
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
