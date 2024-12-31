$("#content_save").on("click", function() {
  "use strict";

  if (content == "") {
    toastr.error("Not any content for save");
  } else {
    toastr.success("Success");
  }
});
$("#copybtn").on("click", function() {
  "use strict";
  var html = content;
  var dom = document.createElement("DIV");
  dom.innerHTML = html;
  var plain_text = dom.textContent || dom.innerText;

  navigator.clipboard.writeText(plain_text);
  toastr.success("Copied");
});
$('#share').on('click',function(){
  "use strict";
  var html = sharelink;
  var dom = document.createElement("DIV");
  dom.innerHTML = html;
  var plain_text = dom.textContent || dom.innerText;
  navigator.clipboard.writeText(plain_text);
  toastr.success("Copied");
 
});
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})