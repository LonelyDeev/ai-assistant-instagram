//add & edit plan script
var i = 1;
$("#addfeature").click(function() {
    "use strict";
    var html =
        '<div class="d-flex mb-2" id="removediv-' + i +
        '"><input type="text" class="form-control" name="plan_features[]" value="" placeholder="" required><button type="button" class="btn btn-danger mx-2 btn-sm" onclick="removefeature(' +
        i + ')"><i class="fa-regular fa-xmark"></i></button></div>';
    $("#repeater").append(html);
    i++;
})
function deletefeature(id) {
    "use strict";
    $('#deletediv' + id).remove();
}
function removefeature(id) {
    "use strict";
    $('#removediv-' + id).remove();
}
// duration and custom selection for plan
$(".type").on('change', function() {
    "use strict";
    $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("value");
        if (optionValue) {
            $(".selecttype").not("." + optionValue).addClass('dn');
            $(".selecttype").not("." + optionValue).find('select').prop('required', false);
            $(".selecttype." + optionValue).removeClass('dn');
            $(".selecttype." + optionValue).find('select').prop('required', true);
        } else {
            $(".selecttype").addClass('dn');
            $(".selecttype").find('select').prop('required', false);
        }
    });
}).change();


$(".service_limit_type").on('change', function() {
    "use strict";
    $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("value");
        if (optionValue) {
            $(".service-limit").not("." + optionValue).addClass('dn');
            $(".service-limit").not("." + optionValue).find('select').prop('required', false);
            $(".service-limit." + optionValue).removeClass('dn');
            $(".service-limit." + optionValue).find('select').prop('required', true);
        } else {
            $(".service-limit").addClass('dn');
            $(".service-limit").find('select').prop('required', false);
        }
    });
}).change();

$(".booking_limit_type").on('change', function() {
    "use strict";
    $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("value");
        if (optionValue) {
            $(".booking-limit").not("." + optionValue).addClass('dn');
            $(".booking-limit").not("." + optionValue).find('select').prop('required', false);
            $(".booking-limit." + optionValue).removeClass('dn');
            $(".booking-limit." + optionValue).find('select').prop('required', true);
        } else {
            $(".booking-limit").addClass('dn');
            $(".booking-limit").find('select').prop('required', false);
        }
    });
}).change();
