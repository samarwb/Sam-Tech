$(function(){
    $('.group_delete_class').click(function(){
        if(confirm('Do you want to delete this group ? ')){
            var group_id = $(this).attr('group_id');
            deleteElement('groups',group_id);
        }
    });
    
    $('.blog_delete_class').click(function(){
        if(confirm('Do you want to delete this Blog ? ')){
            var blog_id = $(this).attr('blog_id');    // this is defined in delete tag
            deleteElement('blogs',blog_id);
        }
    });
    
    $('.catg_delete_class').click(function(){
        if(confirm('Do you want to delete this Category ? ')){
            var catg_id = $(this).attr('catg_id');    // this is defined in delete tag
            deleteElement('category',catg_id);    // table name and its row element id
        }
    });
    
    $('.prog_delete_class').click(function(){
        if(confirm('Do you want to delete this Programme ? ')){
            var prog_id = $(this).attr('prog_id');    // this is defined in delete tag
            deleteElement('programme',prog_id);    // table name and its row element id
        }
    });
    
    $('.inst_delete_class').click(function(){
        if(confirm('Do you want to delete this Institute ? ')){
            var inst_id = $(this).attr('inst_id');    // this is defined in delete tag
            deleteElement('institution',inst_id);    // table name and its row element id
        }
    });
    
    $('.library_delete_class').click(function(){
        if(confirm('Do you want to delete this Library ? ')){
            var lib_id = $(this).attr('lib_id');    // this is defined in delete tag
            deleteElement('library',lib_id);    // table name and its row element id
        }
    });
    
    $('.perm_delete_class').click(function(){
        if(confirm('Do you want to delete this Permission ? ')){
            var per_id = $(this).attr('per_id');    // this is defined in delete tag
            deleteElement('permission',per_id);    // table name and its row element id
        }
    });
    
    $('.role_delete_class').click(function(){
       if(confirm('Do you want to delete this Role ? ')){
           var role_id = $(this).attr('role_id');
           deleteElement('user_roles',role_id);
       } 
    });
    

    $('.role_delete_class').click(function(){
       if(confirm('Do you want to delete this Role ? ')){
           var role_id = $(this).attr('role_id');
           deleteElement('user_roles',role_id);
       } 
    });

    $('.subject_delete_class').click(function(){
       if(confirm('Do you want to delete this Subject ? ')){
           var sub_id = $(this).attr('sub_id');
           deleteElement('suubjects',sub_id);
       } 
    });

    $('.user_delete_class').click(function(){
       if(confirm('Do you want to delete this User ? ')){
           var user_id = $(this).attr('user_id');
           deleteElement('users',user_id);
       } 
    });

    $('.forum_delete_class').click(function(){
       if(confirm('Do you want to delete this Forum ? ')){
           var forum_id = $(this).attr('for_id');
           deleteElement('forum',forum_id);
       } 
    });
    
    $('.stream_delete_class').click(function(){
        if(confirm('Do you want to delete this stream ? ')){
            var stream_id = $(this).attr('stream_id');
            deleteElement('streams',stream_id);
        }     
    });
    
    $('.degtyp_delete_class').click(function(){
        if(confirm('Do you want to delete this Degree type ? ')){
            var degtyp_id = $(this).attr('degtyp_id');
            deleteElement('degree_type',degtyp_id);
        }     
    });
    
    
});

function deleteElement(type,id){
    if((type != '' || type != undefined) && (id != '' || id != undefined)){
        $.ajax({
            url: base_url+'/admin/deleteContent', 
            data:{type:type,id:id},
            type:"POST",
            async:false,
            success: function(result){
                window.location.href = window.location.href;
            },
            error: function(e){
                alert('Opps! some error occurs , delete action cannot be completed. Please try again');
            }
        });
        
    }
}














