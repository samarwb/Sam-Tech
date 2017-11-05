$(function(){
    $('.left_slide,.right_slide').click(function(){
        var current_element = $(".image_slider_list li.current_slider");
        var next_element;
        if($(this).hasClass('left_slide')){
            next_element = current_element.prev(".image_list");
        }else{
           next_element = current_element.next(".image_list"); 
        }
        current_element.removeClass('current_slider');
        current_element.addClass('hidden');
        next_element.removeClass('hidden');
        next_element.addClass('current_slider');
        
    });
    
});