$(function(){
    $('.group_edit_class').click(function(){
        var id = $(this).attr('id');
        if(id !== ''){
            window.location.href = base_url + "/admin/editgroup/"+id;
        }else{
            alert ('Invalud group selection.') ;
       }
    });
});
