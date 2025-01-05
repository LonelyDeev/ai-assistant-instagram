$('#max_result_length').on('keyup',function(){
"use strict";
var x = document.getElementById("max_result_length").max
    if($('#max_result_length').val() > max_tokens )
    {
        $('#max_result_length').val('');
    }

})
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
$('#numberofquestion').on('keyup',function(){
"use strict";
var x = document.getElementById("numberofquestion").max
    if($('#numberofquestion').val() > 10 )
    {
        $('#numberofquestion').val('');
    }

})
$('#no_of_images').on('keyup',function(){
"use strict";
var x = document.getElementById("no_of_images").max
    if($('#no_of_images').val() > 10 )
    {
        $('#no_of_images').val('');
    }

})
$("#btngenerate").on("click", function() {
  "use strict";

    if ($('#EmptyBox').is(':checked')) {
        CKEDITOR.instances['ckeditor'].setData('');
    }

  $("#btngenerate").prop("disabled", true);
    document.getElementById("btngenerate").innerHTML =
      '<i class="fas fa-spinner fa-spin"></i> ' + generateinglabels;
    var title=$("#topic").val();

  if ($("#slug").val() == "ai-images") {
      title=$("#image_topic").val();
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url: contenturl,
      type: "post",
      dataType: "json",
      data: {
        image_topic: $("#image_topic").val(),
        no_of_images: $("#no_of_images").val(),
        image_size: $("#image_size").val(),
        slug: $("#slug").val(),
      },
      success: function(response) {
          if (response.status == 0) {
              document.getElementById("btngenerate").innerHTML = generatelabels;
              $("#btngenerate").prop("disabled", false);
              toastr.error(response.message);
              return false;
          } else if (response.status==1) {
              document.getElementById("btngenerate").innerHTML = generatelabels;
              $("#btngenerate").prop("disabled", false);
              var e;
              let html = '';
              for (e in response.data) {
                  // console.log(response.data[e].url);
                  html += '<div class="col-md-4"><div class="thumbnail"><img src="' + response.data[e].url + '" alt="Lights" style="width:100%"><a href="' + response.data[e].url + '" target="_blank" class="btn btn-secondary w-100 mt-2 mb-2"><i class="fa fa-download"></i> Download</a></div></div>'
              }
              $('#outputimage').html(html);
          }
      }
    });
  }
  else {

      if ($("#slug").val() != "artical-generator-pro"){
          var value = CKEDITOR.instances['ckeditor'].getData();
        }
    var prompt = "";
    var createImage = 0;
    var languages=$("#languages").val();
    var model="gpt-3.5-turbo-instruct";
    if (!languages){
        languages='persian'
    }

      if ($("#slug").val() == "instagram-assistant") {
          title=$("#topic").val();
          if ($('#createImage').is(':checked')) {
              createImage = $("#createImage").val();
          }
          prompt =$("#topic").val();
      }
    if ($("#slug").val() == "content-writer") {
        title=$("#keyword").val();
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Write " +
        $("#variants").val() +
        " Blog Idea & Outline About " +
        $("#keyword").val() +
        "";
    }
    if ($("#slug").val() == "artical-generator") {
        title=$("#topic").val()
            prompt =
                "Translate this into " +
                $("#languages").val() +
                " Write " +
                $("#variants").val() +
                " blog section about " +
                $("#topic").val() +
                " with " +
                $("#blog_section_keyword").val() +
                " keywords";
    }
    if ($("#slug").val() == "artical-generator-pro") {
        title=$("#topic").val()
            model="gpt-3.5-turbo";
            prompt ={
                title:$("#topic").val(),
                language:languages,
                description:$("#blog_section_keyword").val(),
                tool_id: $("#tool_id").val(),
                tools_slug: $("#slug").val(),
                variation: $("#variants").val(),
            }
    }
    if ($("#slug").val() == "business-idea") {
        title=$("#bidea_intrest").val()
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Give me " +
        $("#variants").val() +
        " business Idea about " +
        $("#bidea_intrest").val() +
        " using " +
        $("#bidea_skill").val() +
        " skills";
    }
    if ($("#slug").val() == "cover-latter") {
        title=$("#job_role").val()
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Write me " +
        $("#variants").val() +
        " cover letter for job My Role is " +
        $("#job_role").val() +
        " and my skills are " +
        $("#job_skills").val() +
        "";
    }
    if ($("#slug").val() == "social-post-business") {
        title=$("#social_product_name").val()
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Write me " +
        $("#variants").val() +
        " social media ads product description The Product name is " +
        $("#social_product_name").val() +
        " and the product title is " +
        $("#social_product_desc").val() +
        "";
    }
    if ($("#slug").val() == "google-ads") {
        title=$("#google_product_name").val()
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Write " +
        $("#variants").val() +
        " google search ads The Product Name is " +
        $("#google_product_name").val() +
        " The Product title is " +
        $("#google_product_desc").val() +
        "and the product target keyword is" +
        $("#google_keyword").val() +
        "";
    }
    if ($("#slug").val() == "social-post-personal") {
        title=$("#post_topic").val()
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Write me " +
        $("#variants").val() +
        " post & Caption Idea about " +
        $("#post_topic").val() +
        "";
    }
    if ($("#slug").val() == "product-description") {
        title=$("#pdesc_name").val()
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Write me " +
        $("#variants").val() +
        " Product Description My Product Name is " +
        $("#pdesc_name").val() +
        " And My Product is " +
        $("#pdesc_description").val() +
        "";
    }
    if ($("#slug").val() == "meta-description") {
        title=$("#seo_meta_title").val()
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Write me " +
        $("#variants").val() +
        " SEO Meta Description The SEO Meta Title is " +
        $("#seo_meta_title").val() +
        "";
    }
    if ($("#slug").val() == "meta-title") {
        title=$("#seo_title_keyword").val()
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Write me " +
        $("#variants").val() +
        " SEO Meta Title The target Keyword is " +
        $("#seo_title_keyword").val() +
        "";
    }
    if ($("#slug").val() == "video-description") {
        title=$("#video_title").val()
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Write me " +
        $("#variants").val() +
        "  video description My video title is " +
        $("#video_title").val() +
        "";
    }
    if ($("#slug").val() == "video-idea") {
        title=$("#video_keyword").val()
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Write me " +
        $("#variants").val() +
        "  video idea with target keyword " +
        $("#video_keyword").val() +
        "";
    }
    if ($("#slug").val() == "long-form") {
        title=$("#topic").val()
      prompt =
        "Translate this into " +
        $("#languages").val() +
        " Write a " +
        $("#max_result_length").val() +
        "-word blog post on the topic of " +
        $("#topic").val() +
        "";
    }
    if ($("#slug").val() == "factual-answer") {
        title=$("#factualquestions").val()
      prompt =
        " Q: " +
        $("#factualquestions").val() +
        " in " +
        $("#languages").val() +
        "";
    }

    if ($("#slug").val() == "interview-questions") {
        title=$("#questiontopic").val()
      prompt = "Create a list of " + $("#numberofquestion").val() + " questions for my interview with a " + $("#questiontopic").val() + ": in "+ $("#languages").val() +""
    }

    if ($("#slug").val() == "review-creator") {
        title=$("#reviewname").val()
      prompt = "Write " + $("#variants").val() + " " + $("#reviewname").val() + " review based on these notes: " + $("#review_keyword").val() + " in "+ $("#languages").val() +""
    }

    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url: contenturl,
      type: "post",
      dataType: "json",
      data: {
        keyword: $("#keyword").val(),
        max_tokens: $("#max_result_length").val(),
        model: model,
        //model: "gpt-3.5-turbo",
        prompt: prompt,
        slug: $("#slug").val(),
        temperature: $("#level").val(),
          createImage: createImage
      },
      success: function(response) {
          if (response.status=="saveContent"){
              document.getElementById("btngenerate").innerHTML = generatelabels;
              $("#btngenerate").prop("disabled", false);
              window.location.href = '/mycontent';
              return false;
          }
        if (response.status == 0) {
          document.getElementById("btngenerate").innerHTML = generatelabels;
          $("#btngenerate").prop("disabled", false);
          toastr.error(response.message);
          return false;
        } else if (response.status==1){

            $("#btngenerate").prop("disabled", false);
          document.getElementById("btngenerate").innerHTML = generatelabels;


          if(value !="" && value!=null)
          {
              CKEDITOR.instances["ckeditor"].setData( value + response.data.replace(/\n/g, "<br/>"));
          }
          else
          {
              CKEDITOR.instances["ckeditor"].setData(response.data.replace(/\n/g, "<br/>"));
          }
          if (response.data) {
            $.ajax({
              headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
              },
              url: saveurl,
              type: "post",
              dataType: "json",
              data: {
                title: title,
                tool_id: $("#tool_id").val(),
                slug: $("#slug").val(),
                languages: languages,
                variation: $("#variants").val(),
                content: CKEDITOR.instances['ckeditor'].getData(),
              },
              success: function(response) {
                if (response.status == 0) {
                  toastr.error(response.message);
                  return false;
                }
              }
            });
          }

        }
      }
    });
  }
});

$('#content_save').on('click',function(){
  "use strict";
  var content = CKEDITOR.instances['ckeditor'].getData();
  if (content == "") {
    toastr.error("Not any content for save");
  } else {
    toastr.success("Success");
  }
});
$('#copybtn').on('click',function(){
  "use strict";
  var html = CKEDITOR.instances['ckeditor'].getData();
  var dom = document.createElement("DIV");
  dom.innerHTML = html;
  var plain_text = (dom.textContent || dom.innerText);

  navigator.clipboard.writeText(plain_text);
  toastr.success("Copied");
});



