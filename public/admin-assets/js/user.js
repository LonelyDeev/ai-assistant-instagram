   // live search
   $(document).ready(function() {
    "use strict";
    $("#search_user").keyup(function() {
        var value = $(this).val().toLowerCase();
        $(".search_row #searchuser").filter(function() {
            $(this).toggle($(this).find('#user_name').text().toLowerCase().indexOf(value) > - 1)
        });
    });
});