$(document).ready(function(){

    //  updatePageCategoryStatus Status
    $(document).on("click",".updatePageCategoryStatus",function(){
        var status = $(this).children("i").attr("status");
        var page_category_id = $(this).attr("page_category_id");

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/page-categories/update-page-category-status',
            data:{status:status,page_category_id:page_category_id},
            success:function(resp){
                if(resp['status']==0){
                    $("#page-category-"+page_category_id).html("<i class='fas fa-toggle-off fa-lg text-warning' aria-hidden='true' status='Inactive' style='font-size:1.6em' />");
                }else if (resp['status'] ==1 ){
                    $("#page-category-"+page_category_id).html("<i class='fas fa-toggle-on fa-lg text-success' aria-hidden='true' status='Active' style='font-size:1.6em' />");
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    //  updatePageStatus Status
    $(document).on("click",".updatePageStatus",function(){
        var status = $(this).children("i").attr("status");
        var page_id = $(this).attr("page_id");

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/pages/update-page-status',
            data:{status:status,page_id:page_id},
            success:function(resp){
                if(resp['status']==0){
                    $("#page-"+page_id).html("<i class='fas fa-toggle-off fa-lg text-warning' aria-hidden='true' status='Inactive' style='font-size:1.6em' />");
                }else if (resp['status'] ==1 ){
                    $("#page-"+page_id).html("<i class='fas fa-toggle-on fa-lg text-success' aria-hidden='true' status='Active' style='font-size:1.6em' />");
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    //  updateAcademicProgramMenuStatus Status
    $(document).on("click",".updateAcademicProgramMenuStatus",function(){
        var status = $(this).children("i").attr("status");
        var academic_program_menu_id = $(this).attr("academic_program_menu_id");

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/academic_program_menus/update-academic-program-menus-status',
            data:{status:status,academic_program_menu_id:academic_program_menu_id},
            success:function(resp){
                if(resp['status']==0){
                    $("#academic-program-menu-"+academic_program_menu_id).html("<i class='fas fa-toggle-off fa-lg text-warning' aria-hidden='true' status='Inactive' style='font-size:1.6em' />");
                }else if (resp['status'] ==1 ){
                    $("#academic-program-menu-"+academic_program_menu_id).html("<i class='fas fa-toggle-on fa-lg text-success' aria-hidden='true' status='Active' style='font-size:1.6em' />");
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    //  updateSupervisorStatus Status
    $(document).on("click",".updateSupervisorStatus",function(){
        var status = $(this).children("i").attr("status");
        var supervisor_id = $(this).attr("supervisor_id");

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/supervisors/update-supervisor-status',
            data:{status:status,supervisor_id:supervisor_id},
            success:function(resp){
                if(resp['status']==0){
                    $("#supervisor-"+supervisor_id).html("<i class='fas fa-toggle-off fa-lg text-warning' aria-hidden='true' status='Inactive' style='font-size:1.6em' />");
                }else if (resp['status'] ==1 ){
                    $("#supervisor-"+supervisor_id).html("<i class='fas fa-toggle-on fa-lg text-success' aria-hidden='true' status='Active' style='font-size:1.6em' />");
                }
            },error:function(){
                alert("Error");
            }
        });
    });

     //  updatePostStatus Status
     $(document).on("click",".updatePostStatus",function(){
        var status = $(this).children("i").attr("status");
        var post_id = $(this).attr("post_id");

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/posts/update-post-status',
            data:{status:status,post_id:post_id},
            success:function(resp){
                if(resp['status']==0){
                    $("#post-"+post_id).html("<i class='fas fa-toggle-off fa-lg text-warning' aria-hidden='true' status='Inactive' style='font-size:1.6em' />");
                }else if (resp['status'] ==1 ){
                    $("#post-"+post_id).html("<i class='fas fa-toggle-on fa-lg text-success' aria-hidden='true' status='Active' style='font-size:1.6em' />");
                }
            },error:function(){
                alert("Error");
            }
        });
    });


});