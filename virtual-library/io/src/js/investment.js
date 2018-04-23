jQuery(document).ready(function($) {
    var CLASSROOM_BASE = 4;
    var INSIGHTS_BASE = 5;
    var ASSESSMENTS_BASE = 6;
    var CLASSROOM_DISCOUNT = 3;
    var INSIGHTS_DISCOUNT = 4;
    var ASSESSMENTS_DISCOUNT = 5;
    var EDUCATOR_BASE = 1600;
    var OPERATIONAL_BASE = 400;
    
    var studentPackages;
    var selectedStudentPackages;
    var selectedPackagesTitles = [];
    var studentPackageCount = 0;
    var studentSubcost = 0;
    var studentCost = 0;
    
    var selectedEducatorPackage;
    var selectedOperationalPackage;
    
    var studentCount = 0;
    var studentTotal = 0;
    var studentSavings = 0;
    
    var buildingCount = 0;
    var educatorTotal = 0;
    
    var areaCount = 0;
    var operationalTotal = 0;
    var operationalBuildingCount = 0;
    
    var total = 0;
    
    function updateValues() {
        // INDIVIDUAL COST CALCULATIONS
        // students
        studentPackages = $('.student-package-input');
        selectedStudentPackages = $('.student-package-input:checked');
        studentPackageCount = selectedStudentPackages.length;
        studentSubcost = 0;
        if (selectedStudentPackages.closest('.package').find('#classroom-package').length > 0) {
            studentSubcost += CLASSROOM_BASE;
        }
        if (selectedStudentPackages.closest('.package').find('#insights-package').length > 0) {
            studentSubcost += INSIGHTS_BASE;
        }
        if (selectedStudentPackages.closest('.package').find('#assessments-package').length > 0) {
            studentSubcost += ASSESSMENTS_BASE;
        }
        if (studentPackageCount > 1) {
            studentCost = studentSubcost - studentPackageCount;
            // change checked checkboxPackages to discounted cost
            $('#product-1-cost').text(CLASSROOM_DISCOUNT);
            $('#product-2-cost').text(INSIGHTS_DISCOUNT);
            $('#product-3-cost').text(ASSESSMENTS_DISCOUNT);
            studentPackages.each(function() {
                $(this).closest('.package').find('.discount-label').show();
            });
        } else {
            studentCost = studentSubcost;
            // restore package costs to base cost
            $('#product-1-cost').text(CLASSROOM_BASE);
            $('#product-2-cost').text(INSIGHTS_BASE);
            $('#product-3-cost').text(ASSESSMENTS_BASE);
            studentPackages.each(function() {
                $(this).closest('.package').find('.discount-label').hide();
            });
        }
        // educator
        selectedEducatorPackage = $('.educator-package-input:checked');
        educatorCost = EDUCATOR_BASE * selectedEducatorPackage.length;
        
        // operational
        selectedOperationalPackage = $('.operational-package-input:checked');
        operationalCost = OPERATIONAL_BASE * selectedOperationalPackage.length;
        
        // PRICING CALCULATIONS
        // update view with per item cost
        $('.student-cost').text(studentCost);
        $('.educator-cost').text(educatorCost);
        $('.operational-cost').text(operationalCost);
        
        // get item counts
        studentCount = $('#student-count').val();
        buildingCount = $('#educator-count').val();
        $('#building-count').text(buildingCount);
        areaCount = $('#operational-count').val();
        operationalBuildingCount = $('#operational-building-count').val();
        
        // calculate totals
        studentTotal = studentCount * studentCost;
        educatorTotal = buildingCount * educatorCost;
        operationalTotal = areaCount * operationalBuildingCount * operationalCost;
        total = studentTotal + educatorTotal + operationalTotal;
        
        // calculate and display student savings
        studentSavings = (studentSubcost * studentCount) - studentTotal;
        $('#savings').text(commaSeparateNumber(studentSavings));
        
        // update totals display
        $('#student-total').text(commaSeparateNumber(studentTotal));
        $('#educator-total').text(commaSeparateNumber(educatorTotal));
        $('#operational-total').text(commaSeparateNumber(operationalTotal));
        $('#total').text(commaSeparateNumber(total));
        
        // QUERY PARAMETERS
        selectedPackagesTitles = [];
        if (selectedStudentPackages.length > 0) {
            selectedStudentPackages.each(function() {
                selectedPackagesTitles.push($(this).closest('.package').find('h3').text());
            });
        }
        if (selectedEducatorPackage.length > 0) {
            selectedEducatorPackage.each(function() {
                selectedPackagesTitles.push($(this).closest('.package').find('h3').text());
            });
        }
        if (selectedOperationalPackage.length > 0) {   
            selectedOperationalPackage.each(function() {
                selectedPackagesTitles.push($(this).closest('.package').find('h3').text());
            });
        }
        $('#submit-button').attr('href', function() {
            return '/pricing-form?students=' + Math.floor(studentCount)
                + '&packages=' + selectedPackagesTitles.join(', ').replace(/\s+/, '%20')
                + '&educator=' + buildingCount
                + '&operational=' + areaCount
                + '&operationalBuildings=' + operationalBuildingCount;
        });
    }

    updateValues();

    $('.package-input').on('change', function() {
        updateValues();
        $('#package-callout-wrapper').hide();
    });
    
    $('.package-input').on('click', function() {
        $(this).closest('.package').find('h3').triggerHandler('click');
    });

    $('#student-count').keyup(function(event) {
        if ($(this).val() <= 0 && $(this).val() !== '') {
            $(this).val('0');
        }
        updateValues();
        $('#student-callout-wrapper').hide();
    });
    
    $('#educator-count').keyup(function(event) {
        if ($(this).val() <= 0 && $(this).val() !== '') {
            $(this).val('0');
        }
        updateValues();
        $('#educator-callout-wrapper').hide();
    });
    
    $('#operational-count').keyup(function(event) {
        if ($(this).val() <= 0 && $(this).val() !== '') {
            $(this).val('0');
        }
        updateValues();
        $('#operational-callout-wrapper').hide();
    });

    $('#operational-building-count').keyup(function(event) {
        if ($(this).val() <= 0 && $(this).val() !== '') {
            $(this).val('0');
        }
        updateValues();
        $('#operational-callout-wrapper').hide();
    });
    
    $('#submit-button').on('click', function(event) {
        var head_height;
        var target;
        
        if (packageCount === 0) {
            event.preventDefault();
            $('#package-callout-wrapper').show();
            
            if (studentNumber === '0') {
                $('#student-callout-wrapper').show();
            }
            
            head_height = $('#header').height();
            target = $('#package-callout-wrapper');
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - head_height
                }, 1000);
                return false;
            }
        } else if (studentNumber === '0') {
            event.preventDefault();
            $('#student-callout-wrapper').show();
            
            if (packageCount === 0) {
                $('#package-callout-wrapper').show();
            }
            
            head_height = $('#header').height();
            target = $('#student-callout-wrapper');
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - head_height
                }, 1000);
                return false;
            }
        }
    });
    
    function commaSeparateNumber(val){
        while (/(\d+)(\d{3})/.test(val.toString())){
            val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
        }
        return val;
    }
});
