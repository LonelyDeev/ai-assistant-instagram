$(window).on("load", function() {
  "use strict";
  $("#preloader").fadeOut("slow");
  if ($(".multimenu").find(".active")) {
    $(".multimenu").find(".active").parent().parent().addClass("show");
    $(".multimenu")
      .find(".active")
      .parent()
      .parent()
      .parent()
      .attr("aria-expanded", true);
  }
});


function myFunction() {
  "use strict";
  toastr.error("این عملیات به دلیل حالت نمایشی انجام نشد");
}

// datatable
$(document).ready(function() {
  "use strict";
  $(".zero-configuration").DataTable({
    dom: "Bfrtip",
    buttons: ["excelHtml5", "pdfHtml5"]
  });
  if(type == 2)
  {
    if (sessionvalue == "dark") {
      $('.card').removeClass("border-0");
      $('.card').addClass('dark-theme border-1 border-white');
      $('.card-footer').removeClass('bg-white');
      $('.card-footer').addClass('bg-black border-1 border-white');
      $('p').addClass('text-white');
      $('h5').addClass('text-white');
      $('h4').addClass('text-white');
      $('h3').addClass('text-white');
       $('a').removeClass('text-black');
      $('.sidebar').addClass('dark-theme border border-end-white border-top-0 border-start-0 border-bottom-0');
      $('.dt-button').addClass('datatable-buttons');

    }
    if (sessionvalue == 'light') {
      $('.card').addClass('border-0');
      $('.card').removeClass('dark-theme border-1 border-white');
      $('.card-footer').addClass('bg-white');
      $('.card-footer').removeClass('bg-black border-1 border-white');
      $('p').removeClass('text-white');
      $('h5').removeClass('text-white');
      $('h4').removeClass('text-white');
      $('h3').removeClass('text-white');
      $('a').addClass('text-black');
      $('.btn').removeClass('text-black');
      $('.sidebar').removeClass('dark-theme border border-end-white border-top-0 border-start-0 border-bottom-0');
      $('.dt-button').removeClass('datatable-buttons');

    }
  }

});
function statusupdate(nexturl) {
  "use strict";
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success mx-1",
      cancelButton: "btn btn-danger mx-1"
    },
    buttonsStyling: false
  });
  swalWithBootstrapButtons
    .fire({
      title: are_you_sure,
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: yes,
      cancelButtonText: no,
      reverseButtons: true
    })
    .then(result => {
      if (result.isConfirmed) {
        location.href = nexturl;
      } else {
        result.dismiss === Swal.DismissReason.cancel;
      }
    });
}
$(document).ready(function() {
  $(".numbers_only").keypress(function(e) {
    "use strict";
    var charCode = e.which ? e.which : event.keyCode;
    if (String.fromCharCode(charCode).match(/[^0-9]/g)) return false;
  });

  $(".owl-carousel").owlCarousel({
    rtl: condition,
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });
});
//  numeric value validation
$(".numbers_decimal").on("keyup", function() {
  "use strict";
  var val = $(this).val();
  if (isNaN(val)) {
    val = val.replace(/[^0-9\.]/g, "");
    if (val.split(".").length > 2) {
      val = val.replace(/\.+$/, "");
    }
  }
  $(this).val(val);
});
