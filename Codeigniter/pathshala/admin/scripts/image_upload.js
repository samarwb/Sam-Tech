$(function(){
    $('.upload_button').click(function(e){
        e.stopPropagation();
        e.preventDefault();
        $('.uploaded_images_wrapper').empty();
        preview_image();
        $('.upload_image_file input').hide();
        $('.upload_image_file').append('<input type="file" id="upload_images" name="images[]"  multiple="true" class="upload_image_input form-control file_upload"/>');
    });
    $('body').on('click','.upload_image_close',function(){
        $(this).parent('.upload_images').remove();
    });
});
function preview_image() 
{
 var total_file = $(".upload_image_input").length;
 var target = $('.upload_image_input');
 for(var i=0;i<total_file;i++)
 {
  $('.uploaded_images_wrapper').append("<div class='upload_images'><img src='"+URL.createObjectURL(target[i].files[0])+"'><div class='upload_image_close'>X</div></div>");
 }
}
