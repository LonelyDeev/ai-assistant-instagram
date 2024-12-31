$('.basicinfo').on('click', function() {
    "use strict";
    if ($(this).attr('data-tab') == 'basicinfo') {
        $('html, body').animate({
            scrollTop: 0
        }, '1000');
    }
    $('.list-options').find('.active').removeClass('active');
    $(this).addClass('active');
});


function show_feature_icon(x){

    "use strict";

    $(x).next().html($(x).val())

}

var id = 1;

function add_features(icon, title, description) {

    "use strict";

    var html = '<div class="row remove' + id + '"><div class="col-md-3 form-group"><div class="input-group"><input type="text" class="form-control feature_icon" onkeyup="show_feature_icon(this)" name="feature_icon[]" placeholder="' + icon + '" required><p class="input-group-text"></p></div></div><div class="col-md-3 form-group"><input type="text" class="form-control" name="feature_title[]" placeholder="' + title + '" required></div><div class="col-md-5 form-group"><input type="text" class="form-control" name="feature_description[]" placeholder="' + description + '" required></div><div class="col-md-1 form-group"><button class="btn btn-outline-danger" type="button" onclick="remove_features(' + id + ')"><i class="fa-sharp fa-solid fa-xmark"></i></button></div></div>';

    $('.extra_footer_features').append(html);

    $(".feature_required").prop('required',true);

    id++;

}

function remove_features(id) {

    "use strict";

    $('.remove' + id).remove();

    if ($('.extra_footer_features .row').length == 0) {

        $(".feature_required").prop('required',false);

    }

}