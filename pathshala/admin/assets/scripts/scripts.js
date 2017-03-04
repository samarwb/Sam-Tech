$(function(){
    $('.group_delete_class').click(function(){
        if(confirm('Do you want to delete this group ? ')){
            var group_id = $(this).attr('group_id');
            deleteElement('groups',group_id);
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


$(function(){
    $('.blog_delete_class').click(function(){
        if(confirm('Do you want to delete this Blog ? ')){
            var blog_id = $(this).attr('blog_id');    // this is defined in delete tag
            deleteElementBlog('blogs',blog_id);
        }
    });
});

function deleteElementBlog(type,id){                 //type = database table name
    if((type !== '' || type !== undefined) && (id !== '' || id !== undefined)){
        $.ajax({
            url: base_url+'/admin/deleteContentBlog', 
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

$(function(){
    $('.catg_delete_class').click(function(){
        if(confirm('Do you want to delete this Category ? ')){
            var catg_id = $(this).attr('catg_id');    // this is defined in delete tag
            deleteElementCatg('category',catg_id);    // table name and its row element id
        }
    });
});

function deleteElementCatg(type,id){                 //type = database table name
    if((type !== '' || type !== undefined) && (id !== '' || id !== undefined)){
        $.ajax({
            url: base_url+'/admin/deleteElementCatg', 
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

$(function(){
    $('.degree_delete_class').click(function(){
        if(confirm('Do you want to delete this Degree ? ')){
            var degree_id = $(this).attr('deg_id');    // this is defined in delete tag
            deleteElementDegree('degree',degree_id);    // table name and its row element id
        }
    });
});

function deleteElementDegree(type,id){                 //type = database table name
    if((type !== '' || type !== undefined) && (id !== '' || id !== undefined)){
        $.ajax({
            url: base_url+'/admin/deleteElementDegree', 
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

$(function(){
    $('.inst_delete_class').click(function(){
        if(confirm('Do you want to delete this Institute ? ')){
            var inst_id = $(this).attr('inst_id');    // this is defined in delete tag
            deleteElementInst('institution',inst_id);    // table name and its row element id
        }
    });
});

function deleteElementInst(type,id){                 //type = database table name
    if((type !== '' || type !== undefined) && (id !== '' || id !== undefined)){
        $.ajax({
            url: base_url+'/admin/deleteElementInst', 
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

$(function(){
    $('.library_delete_class').click(function(){
        if(confirm('Do you want to delete this Library ? ')){
            var lib_id = $(this).attr('lib_id');    // this is defined in delete tag
            deleteElementLib('library',lib_id);    // table name and its row element id
        }
    });
});

function deleteElementLib(type,id){                 //type = database table name
    if((type !== '' || type !== undefined) && (id !== '' || id !== undefined)){
        $.ajax({
            url: base_url+'/admin/deleteElementLib', 
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

$(function(){
    $('.perm_delete_class').click(function(){
        if(confirm('Do you want to delete this Permission ? ')){
            var per_id = $(this).attr('per_id');    // this is defined in delete tag
            deleteElementPer('permission',per_id);    // table name and its row element id
        }
    });
});

function deleteElementPer(type,id){                 //type = database table name
    if((type !== '' || type !== undefined) && (id !== '' || id !== undefined)){
        $.ajax({
            url: base_url+'/admin/deleteElementPer', 
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

$(function(){
    $('.role_delete_class').click(function(){
       if(confirm('Do you want to delete this Role ? ')){
           var role_id = $(this).attr('role_id');
           deleteElementRole('user_roles',role_id);
       } 
    });
});
function deleteElementRole(type,id){
    if((type !== '' || type !== undefined) && (id !== '' || id !== undefined)){
        $.ajax({
            url: base_url+'/admin/deleteElementRole', 
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

$(function(){
    $('.subject_delete_class').click(function(){
       if(confirm('Do you want to delete this Subject ? ')){
           var sub_id = $(this).attr('sub_id');
           deleteElementSub('suubjects',sub_id);
       } 
    });
});
function deleteElementSub(type,id){
    if((type !== '' || type !== undefined) && (id !== '' || id !== undefined)){
        $.ajax({
            url: base_url+'/admin/deleteElementSub', 
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

$(function(){
    $('.user_delete_class').click(function(){
       if(confirm('Do you want to delete this User ? ')){
           var user_id = $(this).attr('user_id');
           deleteElementUser('users',user_id);
       } 
    });
});
function deleteElementUser(type,id){
    if((type !== '' || type !== undefined) && (id !== '' || id !== undefined)){
        $.ajax({
            url: base_url+'/admin/deleteElementUser', 
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